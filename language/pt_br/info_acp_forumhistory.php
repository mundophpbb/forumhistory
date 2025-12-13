<?php
/**
 * Arquivo de linguagem para a extensão Forum History (pt).
 * @package mundophpbb/forumhistory
 */
if (!defined('IN_PHPBB')) {
    exit;
}
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}
$lang = array_merge($lang, [
    'ACP_FORUMHISTORY_TITLE' => 'Hoje na História do Fórum',
    'ACP_FORUMHISTORY_SETTINGS' => 'Configurações da História',
    'FORUMHISTORY_YEARS' => 'Anos a considerar',
    'FORUMHISTORY_YEARS_EXPLAIN' => 'Vírgula separada, ex.: 1,3,5',
    'FORUMHISTORY_FACTS_NUM' => 'Número de fatos por dia',
    'ACP_FORUMHISTORY_SAVED' => 'Configurações salvas!',
 
    // Atualizados para exclusão
    'FORUMHISTORY_FORUMS' => 'Fóruns/Categorias a excluir',
    'FORUMHISTORY_FORUMS_EXPLAIN' => 'Selecione múltiplos para excluir da história. Categorias excluirão subfóruns automaticamente. Deixe vazio para incluir todos.',
]);