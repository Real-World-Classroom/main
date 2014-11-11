<?php

$limit = $vars['entity']->num_display;
if (!$limit) {
    $limit = 4;
}

// display Guiding Question #1 answers
$question_1_title = elgg_get_plugin_setting('question_1_title', 'guiding_questions');
echo "<h3><em>Recent answers for: \"$question_1_title\"</em></h3>";
$list = elgg_list_entities(array(
        'type' => 'object',
        'subtype' => 'guiding_question_1',
        'limit' => $limit,
        'pagination' => false
));
if (!$list) {
    $list = '<p class="mtm">' . elgg_echo('guiding_questions:list:no_guiding_questions') . '</p>';
}
echo $list;

// display Guiding Question #2 answers
$question_2_title = elgg_get_plugin_setting('question_2_title', 'guiding_questions');
echo "<h3><em>Recent answers for: \"$question_2_title\"</em></h3>";
$list = elgg_list_entities(array(
        'type' => 'object',
        'subtype' => 'guiding_question_2',
        'limit' => $limit,
        'pagination' => false
));
if (!$list) {
    $list = '<p class="mtm">' . elgg_echo('guiding_questions:list:no_guiding_questions') . '</p>';
}
echo $list;

// display Guiding Question #3 answers
$question_3_title = elgg_get_plugin_setting('question_3_title', 'guiding_questions');
echo "<h3><em>Recent answers for: \"$question_3_title\"</em></h3>";
$list = elgg_list_entities(array(
        'type' => 'object',
        'subtype' => 'guiding_question_3',
        'limit' => $limit,
        'pagination' => false
));
if (!$list) {
    $list = '<p class="mtm">' . elgg_echo('guiding_questions:list:no_guiding_questions') . '</p>';
}
echo $list;

// display Guiding Question #4 answers
$question_4_title = elgg_get_plugin_setting('question_4_title', 'guiding_questions');
echo "<h3><em>Recent answers for: \"$question_4_title\"</em></h3>";
$list = elgg_list_entities(array(
        'type' => 'object',
        'subtype' => 'guiding_question_4',
        'limit' => $limit,
        'pagination' => false
));
if (!$list) {
    $list = '<p class="mtm">' . elgg_echo('guiding_questions:list:no_guiding_questions') . '</p>';
}
echo $list;

// display Guiding Question #5 answers
$question_5_title = elgg_get_plugin_setting('question_5_title', 'guiding_questions');
echo "<h3><em>Recent answers for: \"$question_5_title\"</em></h3>";
$list = elgg_list_entities(array(
        'type' => 'object',
        'subtype' => 'guiding_question_5',
        'limit' => $limit,
        'pagination' => false
));
if (!$list) {
    $list = '<p class="mtm">' . elgg_echo('guiding_questions:list:no_guiding_questions') . '</p>';
}
echo $list;

// display Guiding Question #6 answers
$question_6_title = elgg_get_plugin_setting('question_6_title', 'guiding_questions');
echo "<h3><em>Recent answers for: \"$question_6_title\"</em></h3>";
$list = elgg_list_entities(array(
        'type' => 'object',
        'subtype' => 'guiding_question_6',
        'limit' => $limit,
        'pagination' => false
));
echo $list;
