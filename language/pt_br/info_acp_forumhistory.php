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
    'FORUMHISTORY_CUSTOM_TITLE' => 'Título customizado do widget',
    'FORUMHISTORY_CUSTOM_TITLE_EXPLAIN' => 'Deixe vazio para usar o padrão "Hoje na História".',
    'FORUMHISTORY_YEARS' => 'Anos a considerar',
    'FORUMHISTORY_YEARS_EXPLAIN' => 'Valores separados por vírgula ou intervalos, ex.: 1,3-5,10. Use \'all\' para considerar todos os anos desde o início do fórum.',
    'FORUMHISTORY_FACTS_NUM' => 'Número de fatos por dia',
    'FORUMHISTORY_RANDOM' => 'Fatos aleatórios',
    'FORUMHISTORY_RANDOM_EXPLAIN' => 'Se ativado, seleciona um tópico aleatório para cada ano em vez do mais respondido.',
    'ACP_FORUMHISTORY_SAVED' => 'Configurações salvas!',
    // Atualizados para exclusão
    'FORUMHISTORY_FORUMS' => 'Fóruns/Categorias a excluir',
    'FORUMHISTORY_FORUMS_EXPLAIN' => 'Selecione múltiplos para excluir da história. Categorias excluirão subfóruns automaticamente. Deixe vazio para incluir todos.',
]);