<?php
/**
 * Elgg job listing thumbnail
 */
// Get engine
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

// Get job listing GUID
$job_listing_guid = (int) get_input('job_listing_guid', 0);

// Get file thumbnail size
$size = get_input('size', 'small');

$job_listing = get_entity($job_listing_guid);
if (!$job_listing || $job_listing->getSubtype() != "job_listing") {
	exit;
}

$simpletype = $job_listing->simpletype;
if ($simpletype == "image") {

	// Get file thumbnail
	switch ($size) {
		case "small":
			$thumbfile = $job_listing->thumbnail;
			break;
		case "medium":
			$thumbfile = $job_listing->smallthumb;
			break;
		case "large":
		default:
			$thumbfile = $job_listing->largethumb;
			break;
	}

	// Grab the file
	if ($thumbfile && !empty($thumbfile)) {
		$readfile = new ElggFile();
		$readfile->owner_guid = $job_listing->owner_guid;
		$readfile->setFilename($thumbfile);
		if ($job_listing->mimetype) {
			$mime = $job_listing->mimetype;
		}
		$contents = $readfile->grabFile();

		// caching images for 10 days
		header("Content-type: $mime");
		header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', strtotime("+10 days")), true);
		header("Pragma: public", true);
		header("Cache-Control: public", true);
		header("Content-Length: " . strlen($contents));

		echo $contents;
		exit;
	}
}
