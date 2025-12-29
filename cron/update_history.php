<?php
/**
 * Forum History extension - Cron task
 */

namespace mundophpbb\forumhistory\cron;

use phpbb\cron\task\base;

/**
 * Cron task to invalidate the Forum History cache every 24 hours
 */
class update_history extends base
{
    /** @var \phpbb\config\config */
    protected $config;

    /** @var \phpbb\cache\service */
    protected $cache;

    /**
     * Constructor
     *
     * @param \phpbb\config\config   $config Config object
     * @param \phpbb\cache\service   $cache  Cache service
     */
    public function __construct(
        \phpbb\config\config $config,
        \phpbb\cache\service $cache
    ) {
        $this->config = $config;
        $this->cache  = $cache;
    }

    /**
     * Runs the cron task: invalida o cache do widget
     */
    public function run()
    {
        // Apaga as chaves de cache usadas pela extensão
        $this->cache->destroy('_forumhistory_facts');
        $this->cache->destroy('_forumhistory_today_facts');

        // Atualiza o timestamp da última execução
        $this->config->set('forumhistory_last_update', time());
    }

    /**
     * Verifica se o cron pode ser executado (sempre sim)
     *
     * @return bool
     */
    public function is_runnable()
    {
        return true;
    }

    /**
     * Verifica se o cron DEVE rodar agora (a cada 24 horas)
     *
     * @return bool
     */
    public function should_run()
    {
        $last_update = (int) $this->config['forumhistory_last_update'];

        // Se nunca rodou, força a primeira execução
        if ($last_update === 0)
        {
            return true;
        }

        // Roda se já passaram 24 horas (86400 segundos)
        return $last_update < (time() - 86400);
    }
}