<?php
/**
 * Job listing renderer.
 */
$full = elgg_extract('full_view', $vars, FALSE);
$job_listing = elgg_extract('entity', $vars, FALSE);

if (!$job_listing) {
	return TRUE;
}

$owner = $job_listing->getOwnerEntity();
$container = $job_listing->getContainerEntity();
$categories = elgg_view('output/categories', $vars);
$excerpt = elgg_get_excerpt($job_listing->description);
$mime = $job_listing->mimetype;
$base_type = substr($mime, 0, strpos($mime,'/'));

$owner_link = elgg_view('output/url', array(
	'href' => "job_bank/owner/$owner->username",
	'text' => $owner->name,
	'is_trusted' => true,
));
$author_text = elgg_echo('byline', array($owner_link));

$job_listing_icon = elgg_view_entity_icon($job_listing, 'small');

$date = elgg_view_friendly_time($job_listing->time_created);

$comments_count = $job_listing->countComments();
//only display if there are commments
if ($comments_count != 0) {
	$text = elgg_echo("comments") . " ($comments_count)";
	$comments_link = elgg_view('output/url', array(
		'href' => $job_listing->getURL() . '#job-listing-comments',
		'text' => $text,
		'is_trusted' => true,
	));
} else {
	$comments_link = '';
}

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'job_bank',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$subtitle = "$author_text $date $comments_link $categories";

// do not show the metadata and controls in widget view
if (elgg_in_context('widgets')) {
	$metadata = '';
}

if ($full && !elgg_in_context('gallery')) {

	$extra = '';
	if (elgg_view_exists("job_bank/specialcontent/$mime")) {
		$extra = elgg_view("job_bank/specialcontent/$mime", $vars);
	} else if (elgg_view_exists("job_bank/specialcontent/$base_type/default")) {
		$extra = elgg_view("job_bank/specialcontent/$base_type/default", $vars);
	}

	$params = array(
		'entity' => $job_listing,
		'title' => false,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
	);
	$params = $params + $vars;
	$summary = elgg_view('object/elements/summary', $params);

	$employer = elgg_view('output/text', array('value' => $job_listing->employer));
	$type = elgg_view('output/text', array('value' => $job_listing->employment_type));
	$salary = elgg_view('output/text', array('value' => $job_listing->salary));
	$location = elgg_view('output/text', array('value' => $job_listing->location));
	$desc = elgg_view('output/longtext', array('value' => $job_listing->description));
	$qualifications = elgg_view('output/longtext', array('value' => $job_listing->qualifications));
	$contact_info = elgg_view('output/longtext', array('value' => $job_listing->contact_info));

	$text = "<div class='job-listing-field'>
				<h3><u>Employer:</u></h3>
				$employer
			  </div>
			  <div class='job-listing-field'>
				<h3><u>Type of Employment:</u></h3>
				$type
			  </div>
			  <div class='job-listing-field'>
				<h3><u>Salary:</u></h3>
				$salary
			  </div>
			  <div class='job-listing-field'>
				<h3><u>Location:</u></h3>
				$location
			  </div>
			  <div class='job-listing-field'>
				<h3><u>Job Description:</u></h3>
				$desc
			  </div>
			  <div class='job-listing-field'>
				<h3><u>Desired Qualifications:</u></h3>
				$qualifications
			  </div>
			  <div class='job-listing-field'>
				<h3><u>Contact Information:</u></h3>
				$contact_info
			  </div><br>";

	$body = "$text $extra";

	echo elgg_view('object/elements/full', array(
		'entity' => $job_listing,
		'icon' => $job_listing_icon,
		'summary' => $summary,
		'body' => $body,
	));

} elseif (elgg_in_context('gallery')) {
	echo '<div class="job-listing-gallery-item">';
	echo "<h3>" . $job_listing->title . "</h3>";
	echo elgg_view_entity_icon($job_listing, 'medium');
	echo "<p class='subtitle'>$owner_link $date</p>";
	echo '</div>';
} else {
	// brief view

	$params = array(
		'entity' => $job_listing,
		'metadata' => $metadata,
		'subtitle' => $subtitle,
		'content' => $excerpt,
	);
	$params = $params + $vars;
	$list_body = elgg_view('object/elements/summary', $params);

	echo elgg_view_image_block($job_listing_icon, $list_body);
}
