<?php
/**
 * Common language file for the Forum History extension (English).
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
    // Main widget title
    'FORUMHISTORY_TITLE'              => 'Today in Forum History',

    // Absolute section title (e.g., "Topics created on December 29th through the years")
    'FORUMHISTORY_TODAY_TITLE'        => 'Topics created on %s through the years',

    // Counting texts
    'FORUMHISTORY_REPLY'              => '%d reply',
    'FORUMHISTORY_REPLIES'            => '%d replies',
    'FORUMHISTORY_VIEW'               => '%d view',
    'FORUMHISTORY_VIEWS'              => '%d views',

    // Auxiliary words (used in phrases like "with X replies and Y views")
    'FORUMHISTORY_WITH'               => 'with',
    'FORUMHISTORY_AND'                => 'and',

    // Message when no topics are available
    'NO_FACTS'                        => 'No historical facts found for today.',

    // Full phrases used in the widget
    // Example: "5 years ago, user Name created the topic"
    'FORUMHISTORY_FACT_PREFIX'        => '%1$d years ago, %2$s created the topic',

    // Example: "In 2018, user Name created the topic"
    'FORUMHISTORY_FACT_PREFIX_ABS'    => 'In %1$d, %2$s created the topic',

    // Optional descriptions
    'FORUMHISTORY_RELATIVE_DESC'      => 'Shows topics created exactly on this date in previous years (e.g., "3 years ago...").',
    'FORUMHISTORY_ABSOLUTE_DESC'      => 'Lists the most popular topics created on this date throughout the forum’s history.',
]);