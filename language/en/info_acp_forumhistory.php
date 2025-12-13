<?php
/**
 * Language file for the Forum History extension (en).
 * @package mundophpbb/forumhistory
 */
if (!defined('IN_PHPBB')) {
    exit;
}
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}
$lang = array_merge($lang, [
    'ACP_FORUMHISTORY_TITLE' => 'Today in Forum History',
    'ACP_FORUMHISTORY_SETTINGS' => 'History Settings',
    'FORUMHISTORY_YEARS' => 'Years to consider',
    'FORUMHISTORY_YEARS_EXPLAIN' => 'Comma separated, e.g.: 1,3,5',
    'FORUMHISTORY_FACTS_NUM' => 'Number of facts per day',
    'ACP_FORUMHISTORY_SAVED' => 'Settings saved!',

    // Updated for exclusion
    'FORUMHISTORY_FORUMS' => 'Forums/Categories to exclude',
    'FORUMHISTORY_FORUMS_EXPLAIN' => 'Select multiple to exclude from history. Categories will automatically exclude subforums. Leave empty to include all.',
]);