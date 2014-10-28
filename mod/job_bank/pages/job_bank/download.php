<?php
/**
 * Elgg job listing download.
 */

// Get the guid
$job_listing_guid = get_input("guid");

// Get the job listing
$job_listing = get_entity($job_listing_guid);
if (!$job_listing) {
	register_error(elgg_echo("job_bank:downloadfailed"));
	forward();
}

$mime = $job_listing->getMimeType();
if (!$mime) {
	$mime = "application/octet-stream";
}

$filename = $job_listing->originalfilename;

// fix for IE https issue
header("Pragma: public");

header("Content-type: $mime");
if (strpos($mime, "image/") !== false || $mime == "application/pdf") {
	header("Content-Disposition: inline; filename=\"$filename\"");
} else {
	header("Content-Disposition: attachment; filename=\"$filename\"");
}

ob_clean();
flush();
readfile($job_listing->getFilenameOnFilestore());
exit;
