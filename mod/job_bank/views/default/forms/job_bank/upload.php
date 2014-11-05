<?php
/**
 * Elgg job listing upload/save form
 */
// once elgg_view stops throwing all sorts of junk into $vars, we can use 
$title = elgg_extract('title', $vars, '');
$employer = elgg_extract('employer', $vars, '');
$type = elgg_extract('employment_type', $vars, '');
$salary = elgg_extract('salary', $vars, '');
$location = elgg_extract('location', $vars, '');
$desc = elgg_extract('description', $vars, '');
$qualifications = elgg_extract('qualifications', $vars, '');
$contact_info = elgg_extract('contact_info', $vars, '');
$tags = elgg_extract('tags', $vars, '');
$access_id = elgg_extract('access_id', $vars, ACCESS_DEFAULT);
$container_guid = elgg_extract('container_guid', $vars);
if (!$container_guid) {
	$container_guid = elgg_get_logged_in_user_guid();
}
$guid = elgg_extract('guid', $vars, null);

if ($guid) {
	$job_listing_label = elgg_echo("job_bank:replace");
	$submit_label = elgg_echo('save');
} else {
	$job_listing_label = elgg_echo("job_bank:job_listing");
	$submit_label = elgg_echo('upload');
}

?>
<div>
	<label><?php echo elgg_echo('Job Title'); ?></label><br />
	<?php echo elgg_view('input/text', array('name' => 'title', 'value' => $title)); ?>
</div>
<div>
	<label><?php echo elgg_echo('Employer'); ?></label><br />
	<?php echo elgg_view('input/text', array('name' => 'employer', 'value' => $employer)); ?>
</div>
<div>
	<label><?php echo elgg_echo('Type of Employment'); ?></label><br />
	<?php echo elgg_view('input/text', array('name' => 'employment_type', 'value' => $type, 
	'placeholder' => "Full-time, part-time, temporary, freelance, paid or unpaid internship, etc.")); ?>
</div>
<div>
	<label><?php echo elgg_echo('Salary'); ?></label><br />
	<?php echo elgg_view('input/text', array('name' => 'salary', 'value' => $salary)); ?>
</div>
<div>
	<label><?php echo elgg_echo('Location'); ?></label><br />
	<?php echo elgg_view('input/text', array('name' => 'location', 'value' => $location)); ?>
</div>
<div>
	<label><?php echo elgg_echo('Job Description'); ?></label>
	<?php echo elgg_view('input/longtext', array('name' => 'description', 'value' => $desc)); ?>
</div>
<div>
	<label><?php echo elgg_echo('Desired Qualifications'); ?></label><br />
	<?php echo elgg_view('input/longtext', array('name' => 'qualifications', 'value' => $qualifications)); ?>
</div>
<div>
	<label><?php echo elgg_echo('Contact Information'); ?></label><br />
	<?php echo elgg_view('input/longtext', array('name' => 'contact_info', 'value' => $contact_info)); ?>
</div>
<div>
	<label><?php echo $job_listing_label; ?></label><br />
	<?php echo elgg_view('input/file', array('name' => 'upload')); ?>
</div>
<div>
	<label><?php echo elgg_echo('tags'); ?></label>
	<?php echo elgg_view('input/tags', array('name' => 'tags', 'value' => $tags)); ?>
</div>
<?php

$categories = elgg_view('input/categories', $vars);
if ($categories) {
	echo $categories;
}

?>
<div>
	<label><?php echo elgg_echo('access'); ?></label><br />
	<?php echo elgg_view('input/access', array('name' => 'access_id', 'value' => $access_id)); ?>
</div>
<div class="elgg-foot">
<?php

echo elgg_view('input/hidden', array('name' => 'container_guid', 'value' => $container_guid));

if ($guid) {
	echo elgg_view('input/hidden', array('name' => 'job_listing_guid', 'value' => $guid));
}

echo elgg_view('input/submit', array('value' => $submit_label));

?>
</div>
