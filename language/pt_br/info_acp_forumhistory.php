<?php
/**
 * Arquivo de linguagem para o ACP da extensão Forum History (pt).
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
    'FORUMHISTORY_CUSTOM_TITLE_REQUIRED' => 'O título customizado é obrigatório se usado.',
    'FORUMHISTORY_YEARS' => 'Anos a considerar',
    'FORUMHISTORY_YEARS_EXPLAIN' => 'Valores separados por vírgula ou intervalos, ex.: 1,3-5,10. Use \'all\' para considerar todos os anos desde o início do fórum.',
    'FORUMHISTORY_YEARS_REQUIRED' => 'Os anos a considerar são obrigatórios.',
    'FORUMHISTORY_FACTS_NUM' => 'Número de fatos por dia',
    'FORUMHISTORY_FACTS_NUM_REQUIRED' => 'O número de fatos é obrigatório.',
    'FORUMHISTORY_RANDOM' => 'Fatos aleatórios',
    'FORUMHISTORY_RANDOM_EXPLAIN' => 'Se ativado, seleciona um tópico aleatório para cada ano em vez do mais respondido.',
    'ACP_FORUMHISTORY_SAVED' => 'Configurações salvas!',
    'FORUMHISTORY_ENABLE_RELATIVE' => 'Ativar seção "Hoje na História"',
    'FORUMHISTORY_ENABLE_RELATIVE_EXPLAIN' => 'Esta seção destaca tópicos criados na mesma data de anos anteriores, com frases relativas como "Há X anos...",</br> selecionados com base nas configurações de anos e popularidade.',
    'FORUMHISTORY_ENABLE_ABSOLUTE' => 'Ativar seção "Tópicos criados em [data atual] através dos anos"',
    'FORUMHISTORY_ENABLE_ABSOLUTE_EXPLAIN' => 'Esta seção lista tópicos criados exatamente nesta data em anos diferentes, com frases absolutas como "Em YYYY...",</br> mostrando os mais populares ou aleatórios.',
    'FORUMHISTORY_FORUMS' => 'Fóruns/Categorias a excluir',
    'FORUMHISTORY_FORUMS_EXPLAIN' => 'Selecione múltiplos para excluir da história. Categorias excluirão subfóruns automaticamente. Deixe vazio para incluir todos.',
]);