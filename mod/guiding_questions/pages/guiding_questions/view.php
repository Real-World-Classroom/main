<?php

// Get question guid from input, fetch the object, and store the question title
$question_guid = (int) get_input('guid');
$question = get_entity($question_guid);
$question_title = $question->title;

// set the page title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "Past Answers For:";

// start building the main column of the page
$content = elgg_view_title($title);

// display all answers with relationships to the question object
$content .= elgg_echo("<h3><em>\"$question_title\"</em></h3>");
$answers = elgg_get_entities_from_relationship(array(
    'relationship' => 'answer',
    'relationship_guid' => $question_guid,
    'inverse_relationship' => TRUE,
    'owner_guid' => elgg_get_logged_in_user_guid(),
    'limit' => FALSE
));
if (!$answers) {
    $content .= '<p class="mtm">' . elgg_echo('guiding_questions:user:no_answers') . '</p>';
} else {
	foreach ($answers as &$answer) {
	    $content .= elgg_view_entity($answer);
	}
}

// optionally, add the content for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
        <li><a href="/realworldclassroom/guiding_questions/view_all">All Recent Answers</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
