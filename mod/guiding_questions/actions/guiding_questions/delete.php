<?php

// Get input data
$guid = (int) get_input('guid');

// Make sure we actually have permission to edit
$answer = get_entity($guid);
if (!$answer->canEdit()) {
	register_error(elgg_echo("guiding_questions:delete:failed"));
	forward($job_listing->getURL());
}

// Attempt to delete answer and register result
if (!$answer->delete()) {
	register_error(elgg_echo("guiding_questions:delete:failed"));
} else {
	system_message(elgg_echo("guiding_questions:delete:success"));
}
