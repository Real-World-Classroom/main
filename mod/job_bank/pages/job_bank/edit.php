<?php
/**
 * Edit a job listing
 */
elgg_load_library('elgg:job_bank');

gatekeeper();

$job_listing_guid = (int) get_input('guid');
$job_listing = new JobBankPluginFile($job_listing_guid);
if (!$job_listing) {
	forward();
}
if (!$job_listing->canEdit()) {
	forward();
}

$title = elgg_echo('job_bank:edit');

elgg_push_breadcrumb(elgg_echo('job_bank'), "job_bank/all");
elgg_push_breadcrumb($job_listing->title, $job_listing->getURL());
elgg_push_breadcrumb($title);

elgg_set_page_owner_guid($job_listing->getContainerGUID());

$form_vars = array('enctype' => 'multipart/form-data');
$body_vars = job_bank_prepare_form_vars($job_listing);

$content = elgg_view_form('job_bank/upload', $form_vars, $body_vars);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);
