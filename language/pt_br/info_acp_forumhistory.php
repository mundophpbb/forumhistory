<?php
/**
 * Arquivo de linguagem para o módulo ACP da extensão Forum History (Português do Brasil).
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
    'ACP_FORUMHISTORY_TITLE'                 => 'Hoje na História do Fórum',
    'ACP_FORUMHISTORY_SETTINGS'              => 'Configurações',

    'FORUMHISTORY_CUSTOM_TITLE'              => 'Título personalizado do widget',
    'FORUMHISTORY_CUSTOM_TITLE_EXPLAIN'      => 'Deixe vazio para usar o título padrão "Hoje na História do Fórum".',

    'FORUMHISTORY_YEARS'                     => 'Anos a considerar',
    'FORUMHISTORY_YEARS_EXPLAIN'             => 'Exemplos: 1,3-5,10 ou "all" para todos os anos desde o início do fórum.',

    'FORUMHISTORY_FACTS_NUM'                 => 'Número máximo de fatos por seção',
    'FORUMHISTORY_FACTS_NUM_EXPLAIN'         => 'Quantos tópicos mostrar em cada seção (recomendado: 3 a 5).',

    'FORUMHISTORY_FORUMS'                    => 'Fóruns/Categorias a excluir',
    'FORUMHISTORY_FORUMS_EXPLAIN'            => 'Selecione fóruns ou categorias que não devem aparecer na história. Subfóruns são excluídos automaticamente.',

    'FORUMHISTORY_RANDOM'                    => 'Selecionar tópicos aleatórios',
    'FORUMHISTORY_RANDOM_EXPLAIN'            => 'Se ativado, escolhe tópicos aleatórios em vez dos mais populares.',

    'FORUMHISTORY_ENABLE_RELATIVE'           => 'Ativar seção "Há X anos..."',
    'FORUMHISTORY_ENABLE_RELATIVE_EXPLAIN'   => 'Mostra tópicos criados exatamente na mesma data de anos anteriores (ex: "Há 3 anos...").',

    'FORUMHISTORY_ENABLE_ABSOLUTE'           => 'Ativar seção "Tópicos criados em..."',
    'FORUMHISTORY_ENABLE_ABSOLUTE_EXPLAIN'   => 'Lista os tópicos mais populares criados nesta data ao longo de todos os anos do fórum.',

    // Opções de formato da data
    'FORUMHISTORY_DATE_FORMAT'               => 'Formato da data na seção “Tópicos criados...”',
    'FORUMHISTORY_DATE_FORMAT_EXPLAIN'       => 'Escolha como a data será exibida no título da seção absoluta.',
    'FORUMHISTORY_DATE_FORMAT_DEFAULT'       => 'Automático (ex: 29 de dezembro)',
    'FORUMHISTORY_DATE_FORMAT_NUMERIC'       => 'Numérico (ex: 29/12)',
    'FORUMHISTORY_DATE_FORMAT_MONTH_DAY'     => 'Mês dia (ex: dezembro 29) – estilo americano',

    'ACP_FORUMHISTORY_SAVED'                 => 'Configurações da extensão "Hoje na História do Fórum" foram salvas com sucesso.',
]);