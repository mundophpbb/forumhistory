<?php
/**
 * Common language file for the Forum History extension (English).
 * Apenas strings usadas no index (widget público).
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
    // Título principal do widget
    'FORUMHISTORY_TITLE'                     => 'Today in Forum History',

    // Título da seção absoluta – usa %s para inserir a data já formatada
    'FORUMHISTORY_TODAY_TITLE'               => 'Topics created on %s over the years',

    // Textos de contagem
    'FORUMHISTORY_REPLY'                     => '%d reply',
    'FORUMHISTORY_REPLIES'                   => '%d replies',
    'FORUMHISTORY_VIEW'                      => '%d view',
    'FORUMHISTORY_VIEWS'                     => '%d views',

    // Palavras auxiliares
    'FORUMHISTORY_WITH'                      => 'with',
    'FORUMHISTORY_AND'                       => 'and',

    // Mensagem quando não há fatos
    'NO_FACTS'                               => 'No historical facts found for today.',

    // Prefixos para as linhas dos tópicos
    'FORUMHISTORY_FACT_PREFIX'               => '%1$d years ago, the user %2$s created the topic',
    'FORUMHISTORY_FACT_PREFIX_ABS'           => 'In %1$d, the user %2$s created the topic',
]);