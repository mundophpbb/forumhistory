<?php
/**
 * Módulo ACP para Forum History.
 * @package mundophpbb/forumhistory
 */
namespace mundophpbb\forumhistory\acp;
class forumhistory_module
{
    public $u_action;
    public function main($id, $mode)
    {
        global $language, $template, $request, $config, $phpbb_root_path, $phpEx, $cache; // Adicione $cache aqui
        // Include funções admin para make_forum_select
        require_once($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
        // Carrega o arquivo de linguagem
        $language->add_lang('common', 'mundophpbb/forumhistory');
        $this->tpl_name = 'acp_forumhistory';
        $this->page_title = $language->lang('ACP_FORUMHISTORY_TITLE');
        add_form_key('forumhistory_settings');
        if ($request->is_set_post('submit')) {
            if (!check_form_key('forumhistory_settings')) {
                trigger_error('FORM_INVALID');
            }
            // Salva as configurações
            $config->set('forumhistory_years', $request->variable('forumhistory_years', $config['forumhistory_years'], true));
            $config->set('forumhistory_facts_num', $request->variable('forumhistory_facts_num', (int) $config['forumhistory_facts_num']));
            $selected_forums = $request->variable('forumhistory_forums', array(0));
            $config->set('forumhistory_forums', implode(',', $selected_forums));
            $config->set('forumhistory_custom_title', $request->variable('forumhistory_custom_title', $config['forumhistory_custom_title'], true));
            $config->set('forumhistory_random', $request->variable('forumhistory_random', 0));
            // Purge o cache específico após salvar
            $cache->destroy('_forumhistory_facts');
            trigger_error($language->lang('ACP_FORUMHISTORY_SAVED') . adm_back_link($this->u_action));
        }
        // Restante do código igual...
        $forum_list = make_forum_select(false, false, true, false, false, false, true);
        $current_forums = ($config['forumhistory_forums'] !== '') ? array_map('intval', explode(',', $config['forumhistory_forums'])) : [];
        foreach ($forum_list as $f_id => $f_row) {
            $forum_name = $f_row['padding'] . htmlspecialchars($f_row['forum_name']);
            $template->assign_block_vars('forums', array(
                'FORUM_ID' => $f_id,
                'FORUM_NAME' => $forum_name,
                'SELECTED' => (in_array((int)$f_id, $current_forums)) ? 'selected="selected"' : '',
                'DISABLED' => $f_row['disabled'] ? 'disabled="disabled"' : '',
            ));
        }
        $template->assign_vars([
            'FORUMHISTORY_YEARS' => $config['forumhistory_years'],
            'FORUMHISTORY_FACTS_NUM' => $config['forumhistory_facts_num'],
            'FORUMHISTORY_CUSTOM_TITLE' => $config['forumhistory_custom_title'],
            'FORUMHISTORY_RANDOM' => (bool) $config['forumhistory_random'],
            'U_ACTION' => $this->u_action,
        ]);
    }
}