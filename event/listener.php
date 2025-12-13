<?php
namespace mundophpbb\forumhistory\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
    protected $template, $config, $db, $cache, $language, $auth;

    public function __construct(\phpbb\template\template $template, \phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\cache\driver\driver_interface $cache, \phpbb\language\language $language, \phpbb\auth\auth $auth)
    {
        $this->template = $template;
        $this->config = $config;
        $this->db = $db;
        $this->cache = $cache;
        $this->language = $language;
        $this->auth = $auth;
    }

    public static function getSubscribedEvents()
    {
        return ['core.index_modify_page_title' => 'add_history_widget'];
    }

    public function add_history_widget()
    {
        $this->language->add_lang('common', 'mundophpbb/forumhistory');

        $facts = $this->get_facts();

        $has_facts = false;

        foreach ($facts as $fact) {
            if ($this->auth->acl_get('f_read', $fact['forum_id'])) {
                $this->template->assign_block_vars('history_facts', [
                    'YEAR' => $fact['year'],
                    'USERNAME' => $fact['username'],
                    'TOPIC_TITLE' => $fact['topic_title'],
                    'LINK' => $fact['link'],
                    'REPLY_STRING' => $fact['reply_string'],
                    'VIEW_STRING' => $fact['view_string'],
                ]);
                $has_facts = true;
            }
        }

        $this->template->assign_var('S_SHOW_HISTORY', $has_facts);
    }

    public function get_facts()
    {
        global $phpbb_root_path, $phpEx;

        // Include funções admin para get_forum_branch
        include_once($phpbb_root_path . 'includes/functions_admin.' . $phpEx);

        if ($cached = $this->cache->get('_forumhistory_facts')) {
            return $cached;
        }

        $years = array_filter(array_map('trim', explode(',', $this->config['forumhistory_years'])), 'is_numeric');
        $max_facts = (int) $this->config['forumhistory_facts_num'];
        $facts = [];
        $count = 0;
        $tz = new \DateTimeZone($this->config['board_timezone']);

        // Pega fóruns selecionados para EXCLUIR (se vazio, ignora filtro)
        $excluded_forums = ($this->config['forumhistory_forums'] !== '') ? array_map('intval', explode(',', $this->config['forumhistory_forums'])) : [];
        $excluded_ids = [];
        if (!empty($excluded_forums)) {
            $excluded_ids = $this->get_all_subforums($excluded_forums);
        }

        foreach ($years as $year) {
            $year = (int) $year;
            if ($year <= 0 || $count >= $max_facts) {
                continue;
            }

            // Calcula data dinâmica
            $now = new \DateTime('now', $tz);
            $ago = clone $now;
            $ago->modify("-{$year} years");
            $date_ago = $ago->format('Y-m-d');
            $start = new \DateTime($date_ago . ' 00:00:00', $tz);
            $end = new \DateTime($date_ago . ' 23:59:59', $tz);
            $start_ts = $start->getTimestamp();
            $end_ts = $end->getTimestamp();

            // Consulta DB
            $sql = "SELECT t.topic_id, t.topic_title, t.topic_poster, t.forum_id, u.username, u.user_colour, t.topic_posts_approved AS replies, t.topic_views AS views
                    FROM " . TOPICS_TABLE . " t
                    JOIN " . USERS_TABLE . " u ON t.topic_poster = u.user_id
                    WHERE t.topic_time BETWEEN " . $start_ts . " AND " . $end_ts . "
                    AND t.topic_visibility = 1";

            if (!empty($excluded_ids)) {
                $sql .= " AND NOT " . $this->db->sql_in_set('t.forum_id', $excluded_ids);
            }

            $sql .= " ORDER BY t.topic_posts_approved DESC LIMIT 1";

            $result = $this->db->sql_query($sql);
            if ($row = $this->db->sql_fetchrow($result)) {
                $reply_count = max(0, $row['replies'] - 1);
                $styled_username = get_username_string('no_profile', $row['topic_poster'], $row['username'], $row['user_colour'], $this->language->lang('GUEST'));
                $reply_key = ($reply_count == 1) ? 'FORUMHISTORY_REPLY' : 'FORUMHISTORY_REPLIES';
                $view_key = ((int)$row['views'] == 1) ? 'FORUMHISTORY_VIEW' : 'FORUMHISTORY_VIEWS';
                $facts[] = [
                    'year' => $year,
                    'username' => $styled_username,
                    'topic_title' => $row['topic_title'],
                    'link' => generate_board_url() . "/viewtopic.php?t=" . $row['topic_id'],
                    'reply_string' => $this->language->lang($reply_key, $reply_count),
                    'view_string' => $this->language->lang($view_key, (int)$row['views']),
                    'forum_id' => $row['forum_id'],
                ];
                $count++;
            }
            $this->db->sql_freeresult($result);
        }

        $this->cache->put('_forumhistory_facts', $facts, 86400); // Cache 24h
        return $facts;
    }

    protected function get_all_subforums(array $selected)
    {
        $all_ids = [];
        foreach ($selected as $fid) {
            if (!is_numeric($fid) || $fid <= 0) {
                continue;
            }
            $branch = get_forum_branch((int) $fid, 'children', 'descending', true); // Include self
            foreach ($branch as $row) {
                if ($row['forum_type'] == FORUM_POST) {
                    $all_ids[] = (int) $row['forum_id'];
                }
            }
        }
        return array_unique($all_ids);
    }
}