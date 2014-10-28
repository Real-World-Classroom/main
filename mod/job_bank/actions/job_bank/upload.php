<?php
/**
 * Job listing post/edit action.
 */
// Get variables
$title = htmlspecialchars(get_input('title', '', false), ENT_QUOTES, 'UTF-8');
$desc = get_input("description");
$access_id = (int) get_input("access_id");
$container_guid = (int) get_input('container_guid', 0);
$guid = (int) get_input('job_listing_guid');
$tags = get_input("tags");

if ($container_guid == 0) {
	$container_guid = elgg_get_logged_in_user_guid();
}

elgg_make_sticky_form('job_listing');

// check if upload failed
if (!empty($_FILES['upload']['name']) && $_FILES['upload']['error'] != 0) {
	register_error(elgg_echo('job_bank:cannotload'));
	forward(REFERER);
}

// check whether this is a new job listing or an edit
$new_job_listing = true;
if ($guid > 0) {
	$new_job_listing = false;
}

if ($new_job_listing) {
	// must have a file if a new job listing upload
	if (empty($_FILES['upload']['name'])) {
		$error = elgg_echo('job_bank:nofile');
		register_error($error);
		forward(REFERER);
	}

	$job_listing = new JobBankPluginFile();
	$job_listing->subtype = "job_listing";

	// if no title on new upload, grab filename
	if (empty($title)) {
		$title = htmlspecialchars($_FILES['upload']['name'], ENT_QUOTES, 'UTF-8');
	}

} else {
	// load original job listing object
	$job_listing = new JobBankPluginFile($guid);
	if (!$job_listing) {
		register_error(elgg_echo('job_bank:cannotload'));
		forward(REFERER);
	}

	// user must be able to edit job listing
	if (!$job_listing->canEdit()) {
		register_error(elgg_echo('job_bank:noaccess'));
		forward(REFERER);
	}

	if (!$title) {
		// user blanked title, but we need one
		$title = $job_listing->title;
	}
}

$job_listing->title = $title;
$job_listing->description = $desc;
$job_listing->access_id = $access_id;
$job_listing->container_guid = $container_guid;
$job_listing->tags = string_to_tag_array($tags);

// we have a job listing upload, so process it
if (isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])) {

	$prefix = "job_bank/";

	// if previous job listing, delete it
	if ($new_job_listing == false) {
		$filename = $job_listing->getFilenameOnFilestore();
		if (file_exists($filename)) {
			unlink($filename);
		}

		// use same filename on the disk - ensures thumbnails are overwritten
		$filestorename = $job_listing->getFilename();
		$filestorename = elgg_substr($filestorename, elgg_strlen($prefix));
	} else {
		$filestorename = elgg_strtolower(time().$_FILES['upload']['name']);
	}

	$job_listing->setFilename($prefix . $filestorename);
	$mime_type = ElggFile::detectMimeType($_FILES['upload']['tmp_name'], $_FILES['upload']['type']);

	// hack for Microsoft zipped formats
	$info = pathinfo($_FILES['upload']['name']);
	$office_formats = array('docx', 'xlsx', 'pptx');
	if ($mime_type == "application/zip" && in_array($info['extension'], $office_formats)) {
		switch ($info['extension']) {
			case 'docx':
				$mime_type = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
				break;
			case 'xlsx':
				$mime_type = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
				break;
			case 'pptx':
				$mime_type = "application/vnd.openxmlformats-officedocument.presentationml.presentation";
				break;
		}
	}

	// check for bad ppt detection
	if ($mime_type == "application/vnd.ms-office" && $info['extension'] == "ppt") {
		$mime_type = "application/vnd.ms-powerpoint";
	}

	$job_listing->setMimeType($mime_type);
	$job_listing->originalfilename = $_FILES['upload']['name'];
	$job_listing->simpletype = job_listing_get_simple_type($mime_type);

	// Open the job listing to guarantee the directory exists
	$job_listing->open("write");
	$job_listing->close();
	move_uploaded_file($_FILES['upload']['tmp_name'], $job_listing->getFilenameOnFilestore());

	$guid = $job_listing->save();

	// if image, we need to create thumbnails (this should be moved into a function)
	if ($guid && $job_listing->simpletype == "image") {
		$job_listing->icontime = time();
		
		$thumbnail = get_resized_image_from_existing_file($job_listing->getFilenameOnFilestore(), 60, 60, true);
		if ($thumbnail) {
			$thumb = new ElggFile();
			$thumb->setMimeType($_FILES['upload']['type']);

			$thumb->setFilename($prefix."thumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumbnail);
			$thumb->close();

			$job_listing->thumbnail = $prefix."thumb".$filestorename;
			unset($thumbnail);
		}

		$thumbsmall = get_resized_image_from_existing_file($job_listing->getFilenameOnFilestore(), 153, 153, true);
		if ($thumbsmall) {
			$thumb->setFilename($prefix."smallthumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumbsmall);
			$thumb->close();
			$job_listing->smallthumb = $prefix."smallthumb".$filestorename;
			unset($thumbsmall);
		}

		$thumblarge = get_resized_image_from_existing_file($job_listing->getFilenameOnFilestore(), 600, 600, false);
		if ($thumblarge) {
			$thumb->setFilename($prefix."largethumb".$filestorename);
			$thumb->open("write");
			$thumb->write($thumblarge);
			$thumb->close();
			$job_listing->largethumb = $prefix."largethumb".$filestorename;
			unset($thumblarge);
		}
	} elseif ($job_listing->icontime) {
		// if it is not an image, we do not need thumbnails
		unset($job_listing->icontime);
		
		$thumb = new ElggFile();
		
		$thumb->setFilename($prefix . "thumb" . $filestorename);
		$thumb->delete();
		unset($job_listing->thumbnail);
		
		$thumb->setFilename($prefix . "smallthumb" . $filestorename);
		$thumb->delete();
		unset($job_listing->smallthumb);
		
		$thumb->setFilename($prefix . "largethumb" . $filestorename);
		$thumb->delete();
		unset($job_listing->largethumb);
	}
} else {
	// not saving a job listing but still need to save the entity to push attributes to database
	$job_listing->save();
}

// job listing saved so clear sticky form
elgg_clear_sticky_form('job_listing');


// handle results differently for new job listings and job listing updates
if ($new_job_listing) {
	if ($guid) {
		$message = elgg_echo("job_bank:saved");
		system_message($message);
		add_to_river('river/object/job_bank/create', 'create', elgg_get_logged_in_user_guid(), $job_listing->guid);
	} else {
		// failed to save job listing object - nothing we can do about this
		$error = elgg_echo("job_bank:uploadfailed");
		register_error($error);
	}

	$container = get_entity($container_guid);
	if (elgg_instanceof($container, 'group')) {
		forward("job_bank/group/$container->guid/all");
	} else {
		forward("job_bank/owner/$container->username");
	}

} else {
	if ($guid) {
		system_message(elgg_echo("job_bank:saved"));
	} else {
		register_error(elgg_echo("job_bank:uploadfailed"));
	}

	forward($job_listing->getURL());
}
