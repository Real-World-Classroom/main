<?php

elgg_register_action("guiding_questions/save", elgg_get_plugins_path() . "guiding_questions/actions/guiding_questions/save.php");
elgg_register_event_handler('init', 'system', 'guiding_questions_init');

function guiding_questions_init() {
    elgg_register_page_handler('guiding_questions', 'guiding_questions_page_handler');
}

function guiding_questions_page_handler() {
    include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/guiding_questions.php';
    return true;
}