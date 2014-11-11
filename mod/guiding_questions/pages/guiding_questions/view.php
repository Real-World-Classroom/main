<?php

// make sure only logged in users can see this page
gatekeeper();

// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "All Past Answers:";

// collect individual question titles from settings
$question_1_title = elgg_get_plugin_setting('question_1_title', 'guiding_questions');
$question_2_title = elgg_get_plugin_setting('question_2_title', 'guiding_questions');
$question_3_title = elgg_get_plugin_setting('question_3_title', 'guiding_questions');
$question_4_title = elgg_get_plugin_setting('question_4_title', 'guiding_questions');
$question_5_title = elgg_get_plugin_setting('question_5_title', 'guiding_questions');
$question_6_title = elgg_get_plugin_setting('question_6_title', 'guiding_questions');

// start building the main column of the page
$content = elgg_view_title($title);

// display all answers to question 1
$content .= elgg_echo("<h3><em>\"$question_1_title\"</em></h3>");
$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_1',
    'owner_guid' => elgg_get_logged_in_user_guid()
));
foreach ($answers as &$answer) {
    $content .= elgg_view_entity($answer);
}

// display all answers to question 2
$content .= elgg_echo("<h3><em>\"$question_2_title\"</em></h3>");
$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_2',
    'owner_guid' => elgg_get_logged_in_user_guid()
));
foreach ($answers as &$answer) {
    $content .= elgg_view_entity($answer);
}

// display all answers to question 3
$content .= elgg_echo("<h3><em>\"$question_3_title\"</em></h3>");
$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_3',
    'owner_guid' => elgg_get_logged_in_user_guid()
));
foreach ($answers as &$answer) {
    $content .= elgg_view_entity($answer);
}

// display all answers to question 4
$content .= elgg_echo("<h3><em>\"$question_4_title\"</em></h3>");
$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_4',
    'owner_guid' => elgg_get_logged_in_user_guid()
));
foreach ($answers as &$answer) {
    $content .= elgg_view_entity($answer);
}

// display all answers to question 5
$content .= elgg_echo("<h3><em>\"$question_5_title\"</em></h3>");
$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_5',
    'owner_guid' => elgg_get_logged_in_user_guid()
));
foreach ($answers as &$answer) {
    $content .= elgg_view_entity($answer);
}

// display all answers to question 6
$content .= elgg_echo("<h3><em>\"$question_6_title\"</em></h3>");
$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_6',
    'owner_guid' => elgg_get_logged_in_user_guid()
));
foreach ($answers as &$answer) {
    $content .= elgg_view_entity($answer);
}

// optionally, add the content for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/guiding_questions/view/1">Question 1 Answers</a></li>
		<li><a href="/realworldclassroom/guiding_questions/view/2">Question 2 Answers</a></li>
		<li><a href="/realworldclassroom/guiding_questions/view/3">Question 3 Answers</a></li>
		<li><a href="/realworldclassroom/guiding_questions/view/4">Question 4 Answers</a></li>
		<li><a href="/realworldclassroom/guiding_questions/view/5">Question 5 Answers</a></li>
		<li><a href="/realworldclassroom/guiding_questions/view/6">Question 6 Answers</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
