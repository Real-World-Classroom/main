<?php

elgg_register_event_handler('init', 'system', 'guiding_questions_init');

function guiding_questions_init() {

    // extend CSS
    elgg_extend_view('css/elgg', 'guiding_questions/css');
    elgg_extend_view('css/admin', 'guiding_questions/admin_css');

    // create Guiding Questions page in admin section
    elgg_register_admin_menu_item('administer', 'guiding_questions', 'administer_utilities');
    elgg_register_widget_type('guiding_questions',
                              elgg_echo('guiding_questions:admin:title'),
                              elgg_echo('guiding_questions:widget:description'),
                              'admin'
                             );

    // register page handler
    elgg_register_page_handler('guiding_questions', 'guiding_questions_page_handler');

    // register actions
    elgg_register_action("guiding_questions/save", elgg_get_plugins_path() . "guiding_questions/actions/guiding_questions/save.php");
    elgg_register_action("guiding_questions/delete", elgg_get_plugins_path() . "guiding_questions/actions/guiding_questions/delete.php");
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
