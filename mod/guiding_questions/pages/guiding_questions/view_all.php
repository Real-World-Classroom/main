<?php

// make sure only logged in users can see this page
gatekeeper();

// set the title
// for distributed plugins, be sure to use elgg_echo() for internationalization
$title = "All Recent Answers:";

// start building the main column of the page
$content = elgg_view_title($title);

// also start building sidebar
$sidebar = elgg_echo("<ul class='elgg-menu elgg-menu-page elgg-menu-page-default'>");

// get all active question objects
$actives = elgg_get_entities_from_metadata(array(
    'type' => 'object',
    'subtype' => 'guiding_question',
    'metadata_name_value_pairs' => array(
            'name' => 'active',
            'value' => TRUE
        ),
    'limit' => FALSE
));
// reverse chronological order is more logical for listing questions
$actives = array_reverse($actives);

// display all related answers for each question
$i = 0; // need a counter for sidebar links
foreach ($actives as &$active) {
    $i++;
    $active_title = $active->title;
    $active_guid = $active->guid;
    $content .= elgg_echo("<h3><em>\"$active_title\"</em></h3>");
    $answers = elgg_get_entities_from_relationship(array(
        'relationship' => 'answer',
        'relationship_guid' => $active_guid,
        'inverse_relationship' => TRUE,
        'owner_guid' => elgg_get_logged_in_user_guid(),
        'limit' => 3
    ));
    if (!$answers) {
        $content .= '<p class="mtm">' . elgg_echo('guiding_questions:user:no_answers') . '</p>';
    } else {
        foreach ($answers as &$answer) {
            $content .= elgg_view_entity($answer);
        }
    }
    $sidebar .= elgg_echo("<li><a href='/realworldclassroom/guiding_questions/view/".$active_guid."'>Question $i Answers</a></li>");
}

// finish sidebar
$sidebar .= elgg_echo("</ul>");

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
