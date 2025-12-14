<?php
/**
 * Language file for the Forum History extension ACP (en).
 * @package mundophpbb/forumhistory
 */
if (!defined('IN_PHPBB')) {
    exit;
}
if (empty($lang) || !is_array($lang)) {
    $lang = [];
}
$lang = array_merge($lang, [
    'ACP_FORUMHISTORY_TITLE' => 'Forum History Today',
    'ACP_FORUMHISTORY_SETTINGS' => 'History Settings',
    'FORUMHISTORY_CUSTOM_TITLE' => 'Custom widget title',
    'FORUMHISTORY_CUSTOM_TITLE_EXPLAIN' => 'Leave blank to use the default "Today in History".',
    'FORUMHISTORY_CUSTOM_TITLE_REQUIRED' => 'The custom title is required if used.',
    'FORUMHISTORY_YEARS' => 'Years to consider',
    'FORUMHISTORY_YEARS_EXPLAIN' => 'Comma-separated values or ranges, ex.: 1,3-5,10. Use \'all\' to consider all years since the forum began.',
    'FORUMHISTORY_YEARS_REQUIRED' => 'The years to consider are required.',
    'FORUMHISTORY_FACTS_NUM' => 'Number of facts per day',
    'FORUMHISTORY_FACTS_NUM_REQUIRED' => 'The number of facts is required.',
    'FORUMHISTORY_RANDOM' => 'Random facts',
    'FORUMHISTORY_RANDOM_EXPLAIN' => 'If enabled, selects a random topic for each year instead of the most replied.',
    'ACP_FORUMHISTORY_SAVED' => 'Settings saved!',
    'FORUMHISTORY_ENABLE_RELATIVE' => 'Enable "Today in History" section',
    'FORUMHISTORY_ENABLE_RELATIVE_EXPLAIN' => 'This section highlights topics created on the same date in previous years, with relative phrases like "X years ago...",<br /> selected based on year settings and popularity.',
    'FORUMHISTORY_ENABLE_ABSOLUTE' => 'Enable "Topics created on [current date] through the years" section',
    'FORUMHISTORY_ENABLE_ABSOLUTE_EXPLAIN' => 'This section lists topics created exactly on this date in different years, with absolute phrases like "In YYYY...",<br /> showing the most popular or random ones.',
    'FORUMHISTORY_FORUMS' => 'Forums/Categories to exclude',
    'FORUMHISTORY_FORUMS_EXPLAIN' => 'Select multiple to exclude from history. Categories will automatically exclude subforums. Leave blank to include all.',
]);