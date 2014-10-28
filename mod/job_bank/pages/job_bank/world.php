<?php
/**
 * All job listings
 */
elgg_push_breadcrumb(elgg_echo('job_bank'));

elgg_register_title_button();

$title = elgg_echo('job_bank:all');

$content = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'job_listing',
	'full_view' => FALSE
));
if (!$content) {
	$content = elgg_echo('job_bank:none');
}

$sidebar = job_listing_get_type_cloud();
$sidebar = elgg_view('job_bank/sidebar');

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => $sidebar,
));

echo elgg_view_page($title, $body);
