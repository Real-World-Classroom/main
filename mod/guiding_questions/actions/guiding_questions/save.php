<?php
// get the form inputs
$answer1 = get_input('answer1');
$answer2 = get_input('answer2');
$answer3 = get_input('answer3');
$answer4 = get_input('answer4');
$answer5 = get_input('answer5');
$answer6 = get_input('answer6');

// create a guiding_questions objects to store answers
$question1 = new ElggObject();
$question1->subtype = "guiding_question_1";
$question1->title = "What do you want right now, more than anything else?";
$question1->description = $answer1;

$question2 = new ElggObject();
$question2->subtype = "guiding_question_2";
$question2->title = "What would it do for you?";
$question2->description = $answer2;

$question3 = new ElggObject();
$question3->subtype = "guiding_question_3";
$question3->title = "How would you feel if you got it?";
$question3->description = $answer3;

$question4 = new ElggObject();
$question4->subtype = "guiding_question_4";
$question4->title = "How do you want to spend your time?";
$question4->description = $answer4;

$question5 = new ElggObject();
$question5->subtype = "guiding_question_5";
$question5->title = "What experience do you want?";
$question5->description = $answer5;

$question6 = new ElggObject();
$question6->subtype = "guiding_question_6";
$question6->title = "What's your plan for getting what you want?";
$question6->description = $answer6;

// for now make all guiding_questions answers private
$question1->access_id = ACCESS_PRIVATE;
$question2->access_id = ACCESS_PRIVATE;
$question3->access_id = ACCESS_PRIVATE;
$question4->access_id = ACCESS_PRIVATE;
$question5->access_id = ACCESS_PRIVATE;
$question6->access_id = ACCESS_PRIVATE;

// owner is logged in user
$question1->owner_guid = elgg_get_logged_in_user_guid();
$question2->owner_guid = elgg_get_logged_in_user_guid();
$question3->owner_guid = elgg_get_logged_in_user_guid();
$question4->owner_guid = elgg_get_logged_in_user_guid();
$question5->owner_guid = elgg_get_logged_in_user_guid();
$question6->owner_guid = elgg_get_logged_in_user_guid();

// save to database and get id of the new guiding_questions object,
// but only if user entered an answer
if (!empty($answer1)) {
	$question1_guid = $question1->save();
}
if (!empty($answer2)) {
	$question2_guid = $question2->save();
}
if (!empty($answer3)) {
	$question3_guid = $question3->save();
}
if (!empty($answer4)) {
	$question4_guid = $question4->save();
}
if (!empty($answer5)) {
	$question5_guid = $question5->save();
}
if (!empty($answer6)) {
	$question6_guid = $question6->save();
}

// if any guiding_questions objects were saved, report success, otherwise report failure
if ($question1_guid || $question2_guid || $question3_guid || $question4_guid || $question5_guid || $question6_guid) {
   system_message("Your answers were saved");
   forward(REFERER); // REFERER is a global variable that defines the previous page
} else {
   register_error("No answers were saved");
   forward(REFERER);
}
