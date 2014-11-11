<?php

// make sure only logged in users can see this page
gatekeeper();

// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "Past Answers For:";

// start building the main column of the page
$content = elgg_view_title($title);

// display all answers to question 1
$question_1_title = elgg_get_plugin_setting('question_1_title', 'guiding_questions');
$content .= elgg_echo("<h3><em>\"$question_1_title\"</em></h3>");
$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_1',
    'owner_guid' => elgg_get_logged_in_user_guid()
));
foreach ($answers as &$answer) {
    $content .= elgg_view_entity($answer);
}

// optionally, add the content for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/guiding_questions/view">All Past Answers</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
