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
     'FORUMHISTORY_TITLE' => 'Today in History',
    'FORUMHISTORY_FACT_PREFIX' => '%1$d years ago, the user %2$s created the topic',
    'FORUMHISTORY_REPLY' => '%d reply',
    'FORUMHISTORY_REPLIES' => '%d replies',
    'FORUMHISTORY_VIEW' => '%d view',
    'FORUMHISTORY_VIEWS' => '%d views',
    'FORUMHISTORY_WITH' => 'with',
    'FORUMHISTORY_AND' => 'and',
    'NO_FACTS' => 'No historical facts found for today.',
]);