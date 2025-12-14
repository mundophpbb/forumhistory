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
        $has_facts = false;
        if ($this->config['forumhistory_enable_relative']) {
            $facts = $this->get_facts();
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
            $title = ($this->config['forumhistory_custom_title'] !== '') ? $this->config['forumhistory_custom_title'] : $this->language->lang('FORUMHISTORY_TITLE');
            $this->template->assign_vars([
                'S_SHOW_HISTORY' => $has_facts,
                'FORUMHISTORY_TITLE' => $title,
            ]);
        }
        $has_today = false;
        if ($this->config['forumhistory_enable_absolute']) {
            $today_facts = $this->get_today_facts();
            foreach ($today_facts as $fact) {
                if ($this->auth->acl_get('f_read', $fact['forum_id'])) {
                    $this->template->assign_block_vars('today_facts', [
                        'ACTUAL_YEAR' => $fact['actual_year'],
                        'USERNAME' => $fact['username'],
                        'TOPIC_TITLE' => $fact['topic_title'],
                        'LINK' => $fact['link'],
                        'REPLY_STRING' => $fact['reply_string'],
                        'VIEW_STRING' => $fact['view_string'],
                    ]);
                    $has_today = true;
                }
            }
            $tz = new \DateTimeZone($this->config['board_timezone']);
            $now = new \DateTime('now', $tz);
            $month_key = $now->format('F');
            $month = $this->language->lang(array('datetime', $month_key));
            $day = $now->format('j');
            $date_str = $day . ' de ' . strtolower($month);
            $today_title = $this->language->lang('FORUMHISTORY_TODAY_TITLE', $date_str);
            $this->template->assign_vars([
                'S_SHOW_TODAY' => $has_today,
                'FORUMHISTORY_TODAY_TITLE' => $today_title,
                'DATE_STR' => $date_str,
            ]);
        }
    }
    public function get_facts()
    {
        global $phpbb_root_path, $phpEx;
        // Include funções admin para get_forum_branch
        include_once($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
        $use_cache = !$this->config['forumhistory_random'];
        if ($use_cache && ($cached = $this->cache->get('_forumhistory_facts'))) {
            return $cached;
        }
        $max_facts = (int) $this->config['forumhistory_facts_num'];
        $facts = [];
        $count = 0;
        $tz = new \DateTimeZone($this->config['board_timezone']);
        $now = new \DateTime('now', $tz);
        // Pega fóruns selecionados para EXCLUIR (se vazio, ignora filtro)
        $excluded_forums = ($this->config['forumhistory_forums'] !== '') ? array_map('intval', explode(',', $this->config['forumhistory_forums'])) : [];
        $excluded_ids = [];
        if (!empty($excluded_forums)) {
            $excluded_ids = $this->get_all_subforums($excluded_forums);
        }
        // Parse years
        $input = trim($this->config['forumhistory_years']);
        if (strtolower($input) === 'all') {
            $sql_where = 't.topic_visibility = 1';
            if (!empty($excluded_ids)) {
                $sql_where .= ' AND NOT ' . $this->db->sql_in_set('t.forum_id', $excluded_ids);
            }
            $sql = 'SELECT MIN(t.topic_time) AS min_time FROM ' . TOPICS_TABLE . ' t WHERE ' . $sql_where;
            $result = $this->db->sql_query($sql);
            $min_time = $this->db->sql_fetchfield('min_time');
            $this->db->sql_freeresult($result);
            if ($min_time) {
                $min_date = new \DateTime("@$min_time", $tz);
                $min_year = (int) $min_date->format('Y');
                $current_year = (int) $now->format('Y');
                $max_age = $current_year - $min_year;
                $years = ($max_age > 0) ? range(1, $max_age) : [];
            } else {
                $years = [];
            }
        } else {
            $parts = array_map('trim', explode(',', $input));
            $years = [];
            foreach ($parts as $part) {
                if (strpos($part, '-') !== false) {
                    list($start, $end) = array_map('intval', explode('-', $part, 2));
                    $start = max(1, $start);
                    $end = max($start, $end);
                    for ($i = $start; $i <= $end; $i++) {
                        $years[] = $i;
                    }
                } else {
                    $val = (int) $part;
                    if ($val > 0) {
                        $years[] = $val;
                    }
                }
            }
            $years = array_unique($years);
            sort($years);
        }
        $order_by = $this->config['forumhistory_random'] ? 'RAND()' : 't.topic_posts_approved DESC';
        foreach ($years as $year) {
            if ($count >= $max_facts) {
                break;
            }
            // Calcula data dinâmica
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
            $sql .= " ORDER BY $order_by LIMIT 1";
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
        if ($use_cache) {
            $this->cache->put('_forumhistory_facts', $facts, 86400); // Cache 24h
        }
        return $facts;
    }

    public function get_today_facts()
    {
        global $phpbb_root_path, $phpEx;
        include_once($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
        $use_cache = !$this->config['forumhistory_random'];
        if ($use_cache && ($cached = $this->cache->get('_forumhistory_today_facts'))) {
            return $cached;
        }
        $max_facts = (int) $this->config['forumhistory_facts_num'];
        $facts = [];
        $tz = new \DateTimeZone($this->config['board_timezone']);
        $now = new \DateTime('now', $tz);
        $current_ts = $now->getTimestamp();
        $today_md = $now->format('m-d');
        $excluded_forums = ($this->config['forumhistory_forums'] !== '') ? array_map('intval', explode(',', $this->config['forumhistory_forums'])) : [];
        $excluded_ids = [];
        if (!empty($excluded_forums)) {
            $excluded_ids = $this->get_all_subforums($excluded_forums);
        }
        $order_by = $this->config['forumhistory_random'] ? 'RAND()' : 't.topic_posts_approved DESC';
        $sql_where = 't.topic_visibility = 1 AND t.topic_time < ' . $current_ts;
        if (!empty($excluded_ids)) {
            $sql_where .= ' AND NOT ' . $this->db->sql_in_set('t.forum_id', $excluded_ids);
        }
        $sql = "SELECT t.topic_id, t.topic_title, t.topic_poster, t.forum_id, u.username, u.user_colour, t.topic_posts_approved AS replies, t.topic_views AS views, t.topic_time
                FROM " . TOPICS_TABLE . " t
                JOIN " . USERS_TABLE . " u ON t.topic_poster = u.user_id
                WHERE $sql_where AND FROM_UNIXTIME(t.topic_time, '%m-%d') = '$today_md'
                ORDER BY $order_by LIMIT " . (int)$max_facts;
        $result = $this->db->sql_query($sql);
        while ($row = $this->db->sql_fetchrow($result)) {
            $topic_date = new \DateTime("@{$row['topic_time']}", $tz);
            $actual_year = $topic_date->format('Y');
            $reply_count = max(0, $row['replies'] - 1);
            $styled_username = get_username_string('no_profile', $row['topic_poster'], $row['username'], $row['user_colour'], $this->language->lang('GUEST'));
            $reply_key = ($reply_count == 1) ? 'FORUMHISTORY_REPLY' : 'FORUMHISTORY_REPLIES';
            $view_key = ($row['views'] == 1) ? 'FORUMHISTORY_VIEW' : 'FORUMHISTORY_VIEWS';
            $facts[] = [
                'actual_year' => $actual_year,
                'username' => $styled_username,
                'topic_title' => $row['topic_title'],
                'link' => generate_board_url() . "/viewtopic.php?t=" . $row['topic_id'],
                'reply_string' => $this->language->lang($reply_key, $reply_count),
                'view_string' => $this->language->lang($view_key, (int)$row['views']),
                'forum_id' => $row['forum_id'],
            ];
        }
        $this->db->sql_freeresult($result);
        if ($use_cache) {
            $this->cache->put('_forumhistory_today_facts', $facts, 86400);
        }
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