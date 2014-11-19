<?php

// get total number of active questions from form input
$num_of_actives = get_input('num_of_actives');

// for each one, get user's answer and question's title/guid from form inputs, 
// then create+save a new answer object and form a relationship with the question
for ($i = 1; $i <= $num_of_actives; $i++) {
    $answer_text = get_input('answer_'.$i);
    $question_title = get_input('question_'.$i.'_title');
    $question_guid = get_input('question_'.$i.'_guid');

    // create the answer object
    $answer = new ElggObject();
    $answer->subtype = "guiding_question_answer";
    $answer->title = $question_title;
    $answer->description = $answer_text;

    // for now make all answers private
    $answer->access_id = ACCESS_PRIVATE;

    // owner is logged in user
    $answer->owner_guid = elgg_get_logged_in_user_guid();

    // save to database and get id of the new guiding_questions object,
    // but only if user entered an answer
    if (!empty($answer_text)) {
    	$answer_guid = $answer->save();
    	// if answer was saved, form relationship with question guid, otherwise report failure
    	if ($answer_guid) {
    		$success = $answer->addRelationship($question_guid, 'answer');
    		// register error if relationship failed
    		if (!$success) {
    			register_error("Error: question-answer relationship could not be built");
    		}
    	} else {
    		register_error("Sorry, an error occurred and one or more of your answers were not saved");
    	}
    }
}

system_message("Your answers were saved");
forward(REFERER); // REFERER is a global variable that defines the previous page
