<?php
/**
 * List job listings by type
 */
$page_owner_guid = get_input('page_owner', null);

if ($page_owner_guid !== null) {
	$page_owner_guid = sanitise_int($page_owner_guid);
}

if ($page_owner_guid) {
	elgg_set_page_owner_guid($page_owner_guid);
}
$owner = elgg_get_page_owner_entity();

group_gatekeeper();

// Get input
$md_type = 'simpletype';
// avoid reflected XSS attacks by only allowing alnum characters
$job_listing_type = preg_replace('[\W]', '', get_input('tag'));
$listtype = get_input('listtype');
$friends = (bool)get_input('friends', false);

// breadcrumbs
elgg_push_breadcrumb(elgg_echo('job_bank'), "job_bank/all");
if ($owner) {
	if (elgg_instanceof($owner, 'user')) {
		elgg_push_breadcrumb($owner->name, "job_bank/owner/$owner->username");
	} else {
		elgg_push_breadcrumb($owner->name, "job_bank/group/$owner->guid/all");
	}
}
if ($friends && $owner) {
	elgg_push_breadcrumb(elgg_echo('friends'), "job_bank/friends/$owner->username");
}
if ($job_listing_type) {
	elgg_push_breadcrumb(elgg_echo("job_bank:type:$job_listing_type"));
} else {
	elgg_push_breadcrumb(elgg_echo('all'));
}

// title
if (!$owner) {
	// world job listings
	$title = elgg_echo('all') . ' ' . elgg_echo("job_bank:type:$job_listing_type");
} else {
	$friend_string = $friends ? elgg_echo('job_bank:title:friends') : '';
	$type_string = elgg_echo("job_bank:type:$job_listing_type");
	$title = elgg_echo('job_bank:list:title', array($owner->name, $friend_string, $type_string));
}


$sidebar = job_listing_get_type_cloud($page_owner_guid, $friends);

if ($friends) {
	// elgg_does not support getting objects that belong to an entity's friends
	$friend_entities = get_user_friends($page_owner_guid, "", 999999, 0);
	if ($friend_entities) {
		$friend_guids = array();
		foreach ($friend_entities as $friend) {
			$friend_guids[] = $friend->getGUID();
		}
	}
	$page_owner_guid = $friend_guids;
}

$limit = 10;
if ($listtype == "gallery") {
	$limit = 12;
}

$params = array(
	'type' => 'object',
	'subtype' => 'job_listing',
	'container_guid' => $page_owner_guid,
	'limit' => $limit,
	'full_view' => false,
);

if ($job_listing_type) {
	$params['metadata_name'] = $md_type;
	$params['metadata_value'] = $job_listing_type;
	$content = elgg_list_entities_from_metadata($params);
} else {
	$content = elgg_list_entities($params);
}

$body = elgg_view_layout('content', array(
	'filter' => '',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);
