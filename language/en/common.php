<?php
/**
 * Common language file for the Forum History extension (en).
 * @package mundophpbb/forumhistory
 */
if (!defined('IN_PHPBB')) {
    exit;
}
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}
$lang = array_merge($lang, [
    'FORUMHISTORY_TITLE' => 'Today in History',
    'FORUMHISTORY_FACT_PREFIX' => '%1$d years ago, the user %2$s created the topic',
    'FORUMHISTORY_REPLY' => '%d reply',
    'FORUMHISTORY_REPLIES' => '%d replies',
    'FORUMHISTORY_VIEW' => '%d view',
    'FORUMHISTORY_VIEWS' => '%d views',
    'FORUMHISTORY_WITH' => 'with',
    'FORUMHISTORY_AND' => 'and',
    'NO_FACTS' => 'No historical facts found for today.',
    // Additions for the new section (used in index)
    'FORUMHISTORY_TODAY_TITLE' => 'Topics created on %s through the years',
    'FORUMHISTORY_FACT_PREFIX_ABS' => 'In %1$d, the user %2$s created the topic',
    // New keys for descriptions in index
    'FORUMHISTORY_RELATIVE_DESC' => 'This section shows topics created on the same date in specific years, with phrases like "X years ago...".',
    'FORUMHISTORY_ABSOLUTE_DESC' => 'This section lists the main topics created on the current date in any past year, with phrases like "In YYYY...".',
]);