<?php
/**
 * Arquivo de linguagem comum para a extensão Forum History (Português do Brasil).
 * @package mundophpbb/forumhistory
 */

if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = [];
}

$lang = array_merge($lang, [
    'FORUMHISTORY_TITLE'                     => 'Hoje na História do Fórum', // ou 'Today in Forum History'
    'FORUMHISTORY_TODAY_TITLE'               => 'Tópicos criados em %s através dos anos', // ou 'Topics created on %s over the years'
    'FORUMHISTORY_REPLY'                     => '%d resposta',
    'FORUMHISTORY_REPLIES'                   => '%d respostas',
    'FORUMHISTORY_VIEW'                      => '%d visualização',
    'FORUMHISTORY_VIEWS'                     => '%d visualizações',
    'FORUMHISTORY_WITH'                      => 'com',
    'FORUMHISTORY_AND'                       => 'e',
    'NO_FACTS'                               => 'Nenhum fato histórico encontrado para hoje.',
    'FORUMHISTORY_FACT_PREFIX'               => 'Há %1$d anos, o usuário %2$s criou o tópico',
    'FORUMHISTORY_FACT_PREFIX_ABS'           => 'Em %1$d, o usuário %2$s criou o tópico',
]);