<?php
/**
 * View a job listing
 */
$job_listing = get_entity(get_input('guid'));
if (!$job_listing) {
	register_error(elgg_echo('noaccess'));
	$_SESSION['last_forward_from'] = current_page_url();
	forward('');
}

$owner = elgg_get_page_owner_entity();

elgg_push_breadcrumb(elgg_echo('job_bank'), 'job_bank/all');

$crumbs_title = $owner->name;
if (elgg_instanceof($owner, 'group')) {
	elgg_push_breadcrumb($crumbs_title, "job_bank/group/$owner->guid/all");
} else {
	elgg_push_breadcrumb($crumbs_title, "job_bank/owner/$owner->username");
}

$title = $job_listing->title;

elgg_push_breadcrumb($title);

$content = elgg_view_entity($job_listing, array('full_view' => true));
$content .= elgg_view_comments($job_listing);

// Only provide download button if job listing has supplemental file
$filename = $job_listing->originalfilename;
if ($filename !== "job_bank_default.png") {
	elgg_register_menu_item('title', array(
		'name' => 'download',
		'text' => elgg_echo('job_bank:download'),
		'href' => "job_bank/download/$job_listing->guid",
		'link_class' => 'elgg-button elgg-button-action',
	));
}

$body = elgg_view_layout('content', array(
	'content' => $content,
	'title' => $title,
	'filter' => '',
));

echo elgg_view_page($title, $body);
