<?php
/**
 * Arquivo de linguagem comum para a extensão Forum History (pt).
 * @package mundophpbb/forumhistory
 */
if (!defined('IN_PHPBB')) {
    exit;
}
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}
$lang = array_merge($lang, [
    'FORUMHISTORY_TITLE' => 'Hoje na História',
    'FORUMHISTORY_FACT_PREFIX' => 'Há %1$d anos, o usuário %2$s criou o tópico',
    'FORUMHISTORY_REPLY' => '%d resposta',
    'FORUMHISTORY_REPLIES' => '%d respostas',
    'FORUMHISTORY_VIEW' => '%d visualização',
    'FORUMHISTORY_VIEWS' => '%d visualizações',
    'FORUMHISTORY_WITH' => 'com',
    'FORUMHISTORY_AND' => 'e',
    'NO_FACTS' => 'Nenhum fato histórico encontrado para hoje.',
    // Adições para a nova seção (usadas no index)
    'FORUMHISTORY_TODAY_TITLE' => 'Tópicos criados em %s através dos anos',
    'FORUMHISTORY_FACT_PREFIX_ABS' => 'Em %1$d, o usuário %2$s criou o tópico',
    // Novas chaves para descrições no index
    'FORUMHISTORY_RELATIVE_DESC' => 'Esta seção mostra tópicos criados na mesma data de anos específicos, com frases como "Há X anos...".',
    'FORUMHISTORY_ABSOLUTE_DESC' => 'Esta seção lista os principais tópicos criados na data atual em qualquer ano passado, com frases como "Em YYYY...".',
]);