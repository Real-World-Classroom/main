<?php
/**
 * Job Bank helper functions
 */

/**
 * Prepare the job listing upload/edit form variables
 */
function job_bank_prepare_form_vars($job_listing = null) {

	// input names => defaults
	$values = array(
		'title' => '',
		'employer' => '',
		'employment_type' => '',
		'salary' => '',
		'location' => '',
		'description' => '',
		'qualifications' => '',
		'contact_info' => '',
		'access_id' => ACCESS_DEFAULT,
		'tags' => '',
		'container_guid' => elgg_get_page_owner_guid(),
		'guid' => null,
		'entity' => $job_listing,
	);

	if ($job_listing) {
		foreach (array_keys($values) as $field) {
			if (isset($job_listing->$field)) {
				$values[$field] = $job_listing->$field;
			}
		}
	}

	if (elgg_is_sticky_form('job_listing')) {
		$sticky_values = elgg_get_sticky_values('job_listing');
		foreach ($sticky_values as $key => $value) {
			$values[$key] = $value;
		}
	}

	elgg_clear_sticky_form('job_listing');

	return $values;
}
