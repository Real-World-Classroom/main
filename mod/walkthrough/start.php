<?php

elgg_register_event_handler('init', 'system', 'walkthrough_init');

function walkthrough_init() {
    elgg_register_page_handler('walkthrough', 'walkthrough_page_handler');
}

function walkthrough_page_handler($segments) {
    switch ($segments[0]) {

        case 'logging_on':
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/logging_on.php';
           break;
        case 'profile': 
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/profile.php';
           break;
        case 'portfolio': 
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/portfolio.php';
           break;
        case 'guiding_questions': 
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/guiding_questions.php';
           break;
        case 'friends': 
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/friends.php';
           break;
        case 'more': 
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/more.php';
           break;
        case 'settings': 
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/settings.php';
           break;
        case 'feedback': 
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/feedback.php';
           break;
        case 'welcome':
        default:
           include elgg_get_plugins_path() . 'walkthrough/pages/walkthrough/welcome.php';
           break;
    }
    return true;
}
