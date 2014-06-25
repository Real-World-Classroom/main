<?php

elgg_register_action("guiding_questions/save", elgg_get_plugins_path() . "guiding_questions/actions/guiding_questions/save.php");
elgg_register_event_handler('init', 'system', 'guiding_questions_init');

function guiding_questions_init() {
    elgg_register_page_handler('guiding_questions', 'guiding_questions_page_handler');
}

function guiding_questions_page_handler($segments) {
    switch ($segments[0]) {

        case 'view':
           switch ($segments[1]) {
               case '1': 
                  include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view1.php';
                  break;
               case '2': 
                  include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view2.php';
                  break;
               case '3': 
                  include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view3.php';
                  break;
               case '4': 
                  include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view4.php';
                  break;
               case '5': 
                  include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view5.php';
                  break;
               case '6':
                  include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view6.php';
                  break;
               default:
                  include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view.php';
                  break;
           }
           break;

        case 'answer':
        default:
           include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/answer.php';
           break;
    }
    return true;
}
