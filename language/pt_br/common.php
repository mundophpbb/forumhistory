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
    // Título principal do widget
    'FORUMHISTORY_TITLE'              => 'Hoje na História do Fórum',

    // Título da seção absoluta (ex: "Tópicos criados em 29 de dezembro através dos anos")
    'FORUMHISTORY_TODAY_TITLE'        => 'Tópicos criados em %s através dos anos',

    // Textos de contagem
    'FORUMHISTORY_REPLY'              => '%d resposta',
    'FORUMHISTORY_REPLIES'            => '%d respostas',
    'FORUMHISTORY_VIEW'               => '%d visualização',
    'FORUMHISTORY_VIEWS'              => '%d visualizações',

    // Palavras auxiliares (usadas em frases como "com X respostas e Y visualizações")
    'FORUMHISTORY_WITH'               => 'com',
    'FORUMHISTORY_AND'                => 'e',

    // Mensagem quando não há tópicos para mostrar
    'NO_FACTS'                        => 'Nenhum fato histórico encontrado para hoje.',

    // Frases completas usadas no widget (caso você queira usá-las no template)
    // Exemplo: "Há 5 anos, o usuário Fulano criou o tópico"
    'FORUMHISTORY_FACT_PREFIX'        => 'Há %1$d anos, o usuário %2$s criou o tópico',

    // Exemplo: "Em 2018, o usuário Fulano criou o tópico"
    'FORUMHISTORY_FACT_PREFIX_ABS'    => 'Em %1$d, o usuário %2$s criou o tópico',

    // Descrições opcionais (úteis se você adicionar tooltips ou legendas no widget)
    'FORUMHISTORY_RELATIVE_DESC'      => 'Mostra tópicos criados exatamente nesta mesma data em anos anteriores (ex: “Há 3 anos…”).',
    'FORUMHISTORY_ABSOLUTE_DESC'      => 'Lista os tópicos mais populares criados nesta data ao longo de todos os anos do fórum.',
]);