<?php
/**
 * Friends Job Listings
 */
$owner = elgg_get_page_owner_entity();
if (!$owner) {
	forward('', '404');
}

elgg_push_breadcrumb(elgg_echo('job_bank'), "job_bank/all");
elgg_push_breadcrumb($owner->name, "job_bank/owner/$owner->username");
elgg_push_breadcrumb(elgg_echo('friends'));

elgg_register_title_button();

$title = elgg_echo("job_bank:friends");

// offset is grabbed in list_user_friends_objects
$content = list_user_friends_objects($owner->guid, 'job_listing', 10, false);
if (!$content) {
	$content = elgg_echo("job_bank:none");
}

$sidebar = job_listing_get_type_cloud($owner->guid, true);

$body = elgg_view_layout('content', array(
	'filter_context' => 'friends',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);
