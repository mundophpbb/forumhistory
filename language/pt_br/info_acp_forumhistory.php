<?php
if (!defined('IN_PHPBB')) {
    exit;
}
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}

$lang = array_merge($lang, [
    'ACP_FORUMHISTORY_TITLE'              => 'Hoje na História do Fórum',
    'ACP_FORUMHISTORY_SETTINGS'           => 'Configurações',

    'FORUMHISTORY_CUSTOM_TITLE'           => 'Título personalizado do widget',
    'FORUMHISTORY_CUSTOM_TITLE_EXPLAIN'   => 'Deixe vazio para usar o título padrão "Hoje na História do Fórum".',

    'FORUMHISTORY_YEARS'                  => 'Anos a considerar',
    'FORUMHISTORY_YEARS_EXPLAIN'          => 'Exemplos: 1,3-5,10 ou "all" para todos os anos desde o início do fórum.',

    'FORUMHISTORY_FACTS_NUM'              => 'Número máximo de fatos por seção',
    'FORUMHISTORY_FACTS_NUM_EXPLAIN'      => 'Quantos tópicos mostrar em cada seção (recomendado: 3 a 5).',

    'FORUMHISTORY_FORUMS'                 => 'Fóruns/Categorias a excluir',
    'FORUMHISTORY_FORUMS_EXPLAIN'         => 'Selecione fóruns ou categorias que não devem aparecer na história. Subfóruns são excluídos automaticamente.',

    'FORUMHISTORY_RANDOM'                 => 'Selecionar tópicos aleatórios',
    'FORUMHISTORY_RANDOM_EXPLAIN'         => 'Se ativado, escolhe tópicos aleatórios em vez dos mais populares.',

    'FORUMHISTORY_ENABLE_RELATIVE'        => 'Ativar seção "Há X anos..."',
    'FORUMHISTORY_ENABLE_RELATIVE_EXPLAIN'=> 'Mostra tópicos criados exatamente na mesma data de anos anteriores (ex: "Há 3 anos...").',

    'FORUMHISTORY_ENABLE_ABSOLUTE'        => 'Ativar seção "Tópicos criados em [data atual]"',
    'FORUMHISTORY_ENABLE_ABSOLUTE_EXPLAIN'=> 'Lista os tópicos mais populares criados nesta data em qualquer ano passado.',

    'ACP_FORUMHISTORY_SAVED'              => 'Configurações da extensão "Hoje na História do Fórum" foram salvas com sucesso.',
]);