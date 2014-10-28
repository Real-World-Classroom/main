<?php
/**
 * Job listing download.
 */
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

// Get the guid
$job_listing_guid = get_input("job_listing_guid");

forward("job_bank/download/$job_listing_guid");
