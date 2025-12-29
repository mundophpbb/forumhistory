<?php
if (!defined('IN_PHPBB')) {
    exit;
}
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}

$lang = array_merge($lang, [
    'ACP_FORUMHISTORY_TITLE'              => 'Today in Forum History',
    'ACP_FORUMHISTORY_SETTINGS'           => 'Settings',

    'FORUMHISTORY_CUSTOM_TITLE'           => 'Custom widget title',
    'FORUMHISTORY_CUSTOM_TITLE_EXPLAIN'   => 'Leave empty to use the default title "Today in Forum History".',

    'FORUMHISTORY_YEARS'                  => 'Years to consider',
    'FORUMHISTORY_YEARS_EXPLAIN'          => 'Examples: 1,3-5,10 or "all" for every year since the forum started.',

    'FORUMHISTORY_FACTS_NUM'              => 'Maximum number of facts per section',
    'FORUMHISTORY_FACTS_NUM_EXPLAIN'      => 'How many topics to show in each section (recommended: 3 to 5).',

    'FORUMHISTORY_FORUMS'                 => 'Forums/Categories to exclude',
    'FORUMHISTORY_FORUMS_EXPLAIN'         => 'Select forums or categories that should not appear in the history. Subforums are automatically excluded.',

    'FORUMHISTORY_RANDOM'                 => 'Select random topics',
    'FORUMHISTORY_RANDOM_EXPLAIN'         => 'If enabled, chooses random topics instead of the most popular ones.',

    'FORUMHISTORY_ENABLE_RELATIVE'        => 'Enable "X years ago..." section',
    'FORUMHISTORY_ENABLE_RELATIVE_EXPLAIN'=> 'Shows topics created exactly on the same date in previous years (e.g., "3 years ago...").',

    'FORUMHISTORY_ENABLE_ABSOLUTE'        => 'Enable "Topics created on [current date]" section',
    'FORUMHISTORY_ENABLE_ABSOLUTE_EXPLAIN'=> 'Lists the most popular topics created on this date in any past year.',

    'ACP_FORUMHISTORY_SAVED'              => 'Settings for the "Today in Forum History" extension have been saved successfully.',
]);