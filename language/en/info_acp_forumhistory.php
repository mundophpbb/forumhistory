<?php
/**
 * ACP language file for the Forum History extension (English).
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
    'ACP_FORUMHISTORY_TITLE'                 => 'Today in Forum History',
    'ACP_FORUMHISTORY_SETTINGS'              => 'Settings',

    'FORUMHISTORY_CUSTOM_TITLE'              => 'Custom widget title',
    'FORUMHISTORY_CUSTOM_TITLE_EXPLAIN'      => 'Leave empty to use the default title "Today in Forum History".',

    'FORUMHISTORY_YEARS'                     => 'Years to consider',
    'FORUMHISTORY_YEARS_EXPLAIN'             => 'Examples: 1,3-5,10 or "all" for every year since the forum started.',

    'FORUMHISTORY_FACTS_NUM'                 => 'Maximum number of facts per section',
    'FORUMHISTORY_FACTS_NUM_EXPLAIN'         => 'How many topics to show in each section (recommended: 3 to 5).',

    'FORUMHISTORY_FORUMS'                    => 'Forums/Categories to exclude',
    'FORUMHISTORY_FORUMS_EXPLAIN'            => 'Select forums or categories that should not appear in the history. Subforums are automatically excluded.',

    'FORUMHISTORY_RANDOM'                    => 'Select random topics',
    'FORUMHISTORY_RANDOM_EXPLAIN'            => 'If enabled, chooses random topics instead of the most popular ones.',

    'FORUMHISTORY_ENABLE_RELATIVE'           => 'Enable "X years ago..." section',
    'FORUMHISTORY_ENABLE_RELATIVE_EXPLAIN'   => 'Shows topics created on this exact date in previous years (e.g. "3 years ago...").',

    'FORUMHISTORY_ENABLE_ABSOLUTE'           => 'Enable "Topics created on..." section',
    'FORUMHISTORY_ENABLE_ABSOLUTE_EXPLAIN'   => 'Lists the most popular topics created on this date throughout all the forum’s years.',

    // Date format options
    'FORUMHISTORY_DATE_FORMAT'               => 'Date format for the “Topics created on...” section',
    'FORUMHISTORY_DATE_FORMAT_EXPLAIN'       => 'Choose how the date will appear in the title of the absolute section.',
    'FORUMHISTORY_DATE_FORMAT_DEFAULT'       => 'Automatic (e.g. 29 December)',
    'FORUMHISTORY_DATE_FORMAT_NUMERIC'       => 'Numeric (e.g. 29/12)',
    'FORUMHISTORY_DATE_FORMAT_MONTH_DAY'     => 'Month day (e.g. December 29) – US style',

    'ACP_FORUMHISTORY_SAVED'                 => 'Settings for the "Today in Forum History" extension have been saved successfully.',
]);