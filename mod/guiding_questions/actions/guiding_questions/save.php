<?php
// get the form inputs
$answer1 = get_input('answer1');

// create a new guiding_questions object
$question1 = new ElggObject();
$question1->subtype = "guiding_question";
$question1->title = "Question #1:";
$question1->description = $answer1;

// for now make all guiding_questions answers private
$question1->access_id = ACCESS_PRIVATE;

// owner is logged in user
$question1->owner_guid = elgg_get_logged_in_user_guid();

// save to database and get id of the new guiding_questions object
$question1_guid = $question1->save();

// if the guiding_questions object was saved, we want to display the new answer
// otherwise, we want to register an error and forward back to the form
if ($question1_guid) {
   system_message("Your answer was saved");
   forward($question1->getURL());
} else {
   register_error("Your answer could not be saved");
   forward(REFERER); // REFERER is a global variable that defines the previous page
}