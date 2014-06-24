<?php

// make sure only logged in users can see this page
gatekeeper();

// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "Past Answers";

// start building the main column of the page
$content = elgg_view_title($title);

// add previously saved answers
$content .= elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_1',
    'owner_guid' => elgg_get_logged_in_user_guid()
));

$content .= elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_2',
    'owner_guid' => elgg_get_logged_in_user_guid()
));

$content .= elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_3',
    'owner_guid' => elgg_get_logged_in_user_guid()
));

$content .= elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_4',
    'owner_guid' => elgg_get_logged_in_user_guid()
));

$content .= elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_5',
    'owner_guid' => elgg_get_logged_in_user_guid()
));

$content .= elgg_list_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_6',
    'owner_guid' => elgg_get_logged_in_user_guid()
));

// optionally, add the content for the sidebar
$sidebar = "";

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
