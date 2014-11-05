<?php
/**
 * Display an image ONLY IF it's a user uploaded image
 */
$job_listing = $vars['entity'];

$filename = $job_listing->originalfilename;
if ($filename !== "job_bank_default.png") {
	$image_url = $job_listing->getIconURL('large');
	$image_url = elgg_format_url($image_url);
	$download_url = elgg_get_site_url() . "job_bank/download/{$job_listing->getGUID()}";

	if ($vars['full_view']) {
		echo <<<HTML
			<div class="job-listing-photo">
				<a href="$download_url"><img class="elgg-photo" src="$image_url" /></a>
			</div>
HTML;
	}
}