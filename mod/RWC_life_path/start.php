<?php

elgg_register_event_handler('init', 'system', 'rwc_life_path_init');

function rwc_life_path_init() {
    elgg_register_page_handler('path', 'rwc_life_path_page_handler');
}

function rwc_life_path_page_handler() {
    $params = array(
        'title' => 'Life Path',
        'content' => 'This page is a stub for the life path page, which has yet to be created.<br><br><strong>I CONQUERED THE BUG, THE BUG IS FIXED</strong>',
        'filter' => '',
    );

    $body = elgg_view_layout('content', $params);

    echo elgg_view_page('Life Path', $body);

    return true;
}