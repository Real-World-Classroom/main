<?php

elgg_register_event_handler('init', 'system', 'rwc_resources_init');

function rwc_resources_init() {
    elgg_register_page_handler('resources', 'rwc_resources_page_handler');
}

function rwc_resources_page_handler() {
    $params = array(
        'title' => 'Resources',
        'content' => 'This page is a stub for the resources page, which has yet to be created.<br><br><strong>I CONQUERED THE BUG, THE BUG IS FIXED</strong>',
        'filter' => '',
    );

    $body = elgg_view_layout('content', $params);

    echo elgg_view_page('Resources', $body);

    return true;
}