<?php
/**
* Job listing delete action.
*/
$guid = (int) get_input('guid');

$job_listing = new JobBankPluginFile($guid);
if (!$job_listing->guid) {
	register_error(elgg_echo("job_bank:deletefailed"));
	forward('job_bank/all');
}

if (!$job_listing->canEdit()) {
	register_error(elgg_echo("job_bank:deletefailed"));
	forward($job_listing->getURL());
}

$container = $job_listing->getContainerEntity();

if (!$job_listing->delete()) {
	register_error(elgg_echo("job_bank:deletefailed"));
} else {
	system_message(elgg_echo("job_bank:deleted"));
}

if (elgg_instanceof($container, 'group')) {
	forward("job_bank/group/$container->guid/all");
} else {
	forward("job_bank/owner/$container->username");
}
