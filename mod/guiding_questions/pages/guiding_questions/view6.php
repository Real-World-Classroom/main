<?php

// make sure only logged in users can see this page
gatekeeper();

// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "Past Answers For:";

// start building the main column of the page
$content = elgg_view_title($title);

$content .= elgg_echo('<h3><em>"What\'s your plan for getting what you want?"</em></h3>');

$answers = elgg_get_entities(array(
    'type' => 'object',
    'subtype' => 'guiding_question_6',
    'owner_guid' => elgg_get_logged_in_user_guid()
));

foreach ($answers as &$answer) {
    $desc = $answer->description;
    $date = elgg_view_friendly_time($answer->time_created);
    $content .= elgg_echo("<div style='padding: 15px;
                               margin: 20px;
                               background: #f4f4f4;
                               border: 2px dashed #acacca;
                               border-radius: 10px;
                               box-shadow: 0 0 0 4px #e8e8e8, 2px 1px 6px 4px rgba(10, 10, 0, 0.5);'>
                            $desc<span style='color:#8a8aa8'>$date</span></div>");
}

unset($answer);

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
