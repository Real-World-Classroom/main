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

    // register save/delete actions for question answers
    elgg_register_action("guiding_questions/save", elgg_get_plugins_path() . "guiding_questions/actions/guiding_questions/save.php");
    elgg_register_action("guiding_questions/delete", elgg_get_plugins_path() . "guiding_questions/actions/guiding_questions/delete.php");

    // register hook for saving admin settings
    elgg_register_plugin_hook_handler('action', 'plugins/settings/save', 'guiding_questions_save_admin_settings');
}

/**
 * Dispatches guiding question pages.
 * URLs take the form of
 *  Answer form:            guiding_questions/answer
 *  View question answers:  guiding_questions/view/<guid>
 *  View all answers:       guiding_questions/view_all
 */
function guiding_questions_page_handler($segments) {
    switch ($segments[0]) {
        case 'view_all':
            include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view_all.php';
            break;
        case 'view':
            if ($segments[1]) {
                // only show page if valid guid provided and question is active
                $question_guid = $segments[1];
                $question = get_entity($question_guid);
                if ($question && ($question->active == TRUE)) {
                    set_input('guid', $segments[1]);
                    include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/view.php';
                    break;
                }
            }
        case 'answer':
        default:
           include elgg_get_plugins_path() . 'guiding_questions/pages/guiding_questions/answer.php';
           break;
    }
    return true;
}

function guiding_questions_save_admin_settings() {
// New question action:
    // get the question text from form input
    $new_question_text = get_input('new_question');
    // do nothing if no text was entered
    if (!empty($new_question_text)) {
        // create a guiding_question object with text as title and default to deactivated status
        $new_question = new ElggObject();
        $new_question->subtype = "guiding_question";
        $new_question->title = $new_question_text;
        $new_question->active = FALSE;
        // owner is logged in user
        $new_question->owner_guid = elgg_get_logged_in_user_guid();
        // save to database and get id of the new guiding_question object
        $new_question_guid = $new_question->save();
        // if the new question object was saved, report success, otherwise report failure
        if ($new_question_guid) {
            system_message(elgg_echo("guiding_questions:settings:new_question_success"));
        } else {
            register_error(elgg_echo("guiding_questions:settings:new_question_failure"));
        }
    }

// Activate select's activation action:
    // get guid of question to be activated from form input
    $activated_guid = get_input('inactive_list');
    // do nothing if no question was selected
    if ($activated_guid > 0) {
        // fetch the question object
        $activated = get_entity($activated_guid);
        // simply set 'active' metadata to true to activate it (no saving necessary)
        $activated->active = TRUE;
    }

// Deactivate select's deactivation action:
    // get guid of question to be deactivated from form input
    $deactivated_guid = get_input('active_list');
    // do nothing if no question was selected
    if ($deactivated_guid > 0) {
        // fetch the question object
        $deactivated = get_entity($deactivated_guid);
        // simply set 'active' metadata to false to deactivate it (no saving necessary)
        $deactivated->active = FALSE;
    }

// Edit active questions action:
    // get total number of active questions from form input
    $num_of_actives = get_input('num_of_actives');
    // for each one, get new title and guid from form inputs, then retrieve object and change title to new one
    for ($i = 1; $i <= $num_of_actives; $i++) {
        $new_title = get_input('question_'.$i.'_title');
        $guid = get_input('question_'.$i.'_guid');
        $question = get_entity($guid);
        $question->title = $new_title;
        $question->save();
    }

    system_message(elgg_echo("guiding_questions:settings:saved"));
    forward(REFERER);
}
