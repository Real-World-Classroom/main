<?php
/**
 * Individual's or group's job listings
 */
// access check for closed groups
group_gatekeeper();

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('', '404');
}

elgg_push_breadcrumb(elgg_echo('job_bank'), "job_bank/all");
elgg_push_breadcrumb($owner->name);

elgg_register_title_button();

$params = array();

if ($owner->guid == elgg_get_logged_in_user_guid()) {
	// user looking at own job listings
	$params['filter_context'] = 'mine';
} else if (elgg_instanceof($owner, 'user')) {
	// someone else's job listings
	// do not show select a tab when viewing someone else's posts
	$params['filter_context'] = 'none';
} else {
	// group job listings
	$params['filter'] = '';
}

$title = elgg_echo("job_bank:user", array($owner->name));

// List job listings
$content = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'job_listing',
	'container_guid' => $owner->guid,
	'full_view' => FALSE,
));
if (!$content) {
	$content = elgg_echo("job_bank:none");
}

$sidebar = job_listing_get_type_cloud(elgg_get_page_owner_guid());
$sidebar = elgg_view('job_bank/sidebar');

$params['content'] = $content;
$params['title'] = $title;
$params['sidebar'] = $sidebar;

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
