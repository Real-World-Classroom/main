<?php
/**
 * Post a new job listing
 */
elgg_load_library('elgg:job_bank');

$owner = elgg_get_page_owner_entity();

gatekeeper();
group_gatekeeper();

$title = elgg_echo('Post a new job listing');

// set up breadcrumbs
elgg_push_breadcrumb(elgg_echo('job_bank'), "job_bank/all");
if (elgg_instanceof($owner, 'user')) {
	elgg_push_breadcrumb($owner->name, "job_bank/owner/$owner->username");
} else {
	elgg_push_breadcrumb($owner->name, "job_bank/group/$owner->guid/all");
}
elgg_push_breadcrumb($title);

// create form
$form_vars = array('enctype' => 'multipart/form-data');
$body_vars = job_bank_prepare_form_vars();
$content = elgg_view_form('job_bank/upload', $form_vars, $body_vars);

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);
