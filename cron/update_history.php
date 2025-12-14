<?php
namespace mundophpbb\forumhistory\cron;
class update_history extends \phpbb\cron\task\base
{
    protected $config;
    public function __construct(\phpbb\config\config $config)
    {
        $this->config = $config;
    }
    public function run()
    {
        // Força recalculo chamando get_facts (mas como é private, melhor destruir cache)
        global $cache;
        $cache->destroy('_forumhistory_facts');
        $cache->destroy('_forumhistory_today_facts'); // Adição para o novo cache
        // Se quiser forçar rebuild imediato, injete db etc. e chame get_facts, mas destroy basta (rebuild on next access)
        $this->config->set('forumhistory_last_update', time());
    }
    public function is_runnable()
    {
        return true; // Sempre rodável
    }
    public function should_run()
    {
        return $this->config['forumhistory_last_update'] < time() - 86400; // Roda a cada 24h
    }
}