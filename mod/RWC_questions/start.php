<?php

elgg_register_event_handler('init', 'system', 'rwc_questions_init');

function rwc_questions_init() {
    elgg_register_page_handler('questions', 'rwc_questions_page_handler');
}

function rwc_questions_page_handler() {
    $params = array(
        'title' => 'Guiding Questions',
        'content' => 'This page is a stub for the guiding questions page, which has yet to be created.<br><br><strong>I CONQUERED THE BUG, THE BUG IS FIXED</strong>',
        'filter' => '',
    );

    $body = elgg_view_layout('content', $params);

    echo elgg_view_page('Guiding Questions', $body);

    return true;
}