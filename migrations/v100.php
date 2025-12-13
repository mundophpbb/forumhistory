<?php
/**
 * Migração inicial para Forum History v1.0.0.
 * @package mundophpbb/forumhistory
 */
namespace mundophpbb\forumhistory\migrations;
use phpbb\db\migration\migration;
/**
 * Migração para instalar a extensão Forum History
 */
class v100 extends migration
{
    /**
     * Verificar se a extensão está efetivamente instalada
     *
     * @return bool Verdadeiro se a configuração forumhistory_years existe
     */
    public function effectively_installed()
    {
        return $this->config->offsetExists('forumhistory_years');
    }
    /**
     * Adicionar configurações e módulo ACP
     *
     * @return array Array de instruções de atualização de dados
     */
    public function update_data()
    {
        return [
            // Adiciona configs apenas se não existirem
            ['config.add', ['forumhistory_years', '1,3,5']],
            ['config.add', ['forumhistory_facts_num', 3]],
            ['config.add', ['forumhistory_last_update', time()]],
            ['config.add', ['forumhistory_forums', '']], // Vazio significa incluir todos
            ['config.add', ['forumhistory_custom_title', '']],
            ['config.add', ['forumhistory_random', 0]],
            // Adiciona categoria do módulo ACP
            ['module.add', [
                'acp',
                'ACP_CAT_DOT_MODS',
                'ACP_FORUMHISTORY_TITLE'
            ]],
            // Adiciona o módulo de configurações
            ['module.add', [
                'acp',
                'ACP_FORUMHISTORY_TITLE',
                [
                    'module_basename' => '\mundophpbb\forumhistory\acp\forumhistory_module',
                    'module_langname' => 'ACP_FORUMHISTORY_SETTINGS',
                    'module_mode' => 'settings',
                    'module_auth' => 'ext_mundophpbb/forumhistory && acl_a_board',
                ],
            ]],
        ];
    }
    /**
     * Remover configurações e módulo ACP
     *
     * @return array Array de instruções de reversão de dados
     */
    public function revert_data()
    {
        return [
            // Remover configurações
            ['config.remove', ['forumhistory_years']],
            ['config.remove', ['forumhistory_facts_num']],
            ['config.remove', ['forumhistory_last_update']],
            ['config.remove', ['forumhistory_forums']],
            ['config.remove', ['forumhistory_custom_title']],
            ['config.remove', ['forumhistory_random']],
            // Remover módulo ACP
            ['module.remove', [
                'acp',
                'ACP_FORUMHISTORY_TITLE',
                [
                    'module_basename' => '\mundophpbb\forumhistory\acp\forumhistory_module',
                    'module_langname' => 'ACP_FORUMHISTORY_SETTINGS',
                    'module_mode' => 'settings',
                ],
            ]],
            // Remover categoria ACP
            ['module.remove', [
                'acp',
                'ACP_CAT_DOT_MODS',
                'ACP_FORUMHISTORY_TITLE',
            ]],
        ];
    }
}