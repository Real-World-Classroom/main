<?php

$offset = (int)get_input('offset');
$limit = 10;

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
foreach ($actives as &$active) {
    $active_title = $active->title;
    $active_guid = $active->guid;
    echo elgg_echo("<h3><em>All answers for: \"$active_title\"</em></h3>");
    $list = elgg_list_entities_from_relationship(array(
        'relationship' => 'answer',
        'relationship_guid' => $active_guid,
        'inverse_relationship' => TRUE,
        'limit' => $limit,
        'offset' => $offset
    ));
    if (!$list) {
        $list = '<p class="mtm">' . elgg_echo('guiding_questions:admin:no_answers') . '</p>';
    }
    echo $list;
}
