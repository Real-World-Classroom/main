<?php
/**
 * Job bank plugin language pack
 */
$english = array(

	/**
	 * Menu items and titles
	 */
	'job_bank' => "Job Bank",
	'job_bank:user' => "%s's job listings",
	'job_bank:friends' => "Friends' job listings",
	'job_bank:all' => "All job listings",
	'job_bank:edit' => "Edit job listing",
	'job_bank:more' => "More job listings",
	'job_bank:list' => "list view",
	'job_bank:group' => "Group job listings",
	'job_bank:gallery' => "gallery view",
	'job_bank:gallery_list' => "Gallery or list view",
	'job_bank:num_listings' => "Number of job listings to display",
	'job_bank:user:gallery'=>'View %s job listings',
	'job_bank:upload' => "Post a new job listing",
	'job_bank:replace' => 'Replace job listing content (leave blank to not change job listing)',
	'job_bank:list:title' => "%s's %s %s",
	'job_bank:title:friends' => "Friends'",

	'job_bank:add' => 'Post a new job listing',

	'job_bank:job_listing' => "Job Listing Upload",
	'job_bank:title' => "Title",
	'job_bank:desc' => "Description",
	'job_bank:tags' => "Tags",

	'job_bank:list:list' => 'Switch to the list view',
	'job_bank:list:gallery' => 'Switch to the gallery view',

	'job_bank:types' => "Job listing types",

	'job_bank:type:' => 'Job Listings',
	'job_bank:type:all' => "All job listings",
	'job_bank:type:video' => "Videos",
	'job_bank:type:document' => "Documents",
	'job_bank:type:audio' => "Audio",
	'job_bank:type:image' => "Pictures",
	'job_bank:type:general' => "General",

	'job_bank:user:type:video' => "%s's videos",
	'job_bank:user:type:document' => "%s's documents",
	'job_bank:user:type:audio' => "%s's audio",
	'job_bank:user:type:image' => "%s's pictures",
	'job_bank:user:type:general' => "%s's job listings",

	'job_bank:friends:type:video' => "Your friends' videos",
	'job_bank:friends:type:document' => "Your friends' documents",
	'job_bank:friends:type:audio' => "Your friends' audio",
	'job_bank:friends:type:image' => "Your friends' pictures",
	'job_bank:friends:type:general' => "Your friends' job listings",

	'job_bank:widget' => "Job bank widget",
	'job_bank:widget:description' => "Check the latest job listings",

	'groups:enablelistings' => 'Enable group job listings',

	'job_bank:download' => "Download this",

	'job_bank:delete:confirm' => "Are you sure you want to delete this job listing?",

	'job_bank:tagcloud' => "Tag cloud",

	'job_bank:display:number' => "Number of job listings to display",

	'river:create:object:job_listing' => '%s uploaded the job listing %s',
	'river:comment:object:job_listing' => '%s commented on the job listing %s',

	'item:object:job_listing' => 'Job listings',

	'job_bank:newupload' => 'A new job listing has been posted',
	'job_bank:notification' =>
'%s posted a new job listing:

%s
%s

View and comment on the new listing:
%s
',

	/**
	 * Embed media
	 **/

		'job_bank:embed' => "Embed media",
		'job_bank:embedall' => "All",

	/**
	 * Status messages
	 */

		'job_bank:saved' => "Your job listing was successfully saved.",
		'job_bank:deleted' => "Your job listing was successfully deleted.",

	/**
	 * Error messages
	 */

		'job_bank:none' => "No job listings.",
		'job_bank:uploadfailed' => "Sorry; we could not save your job listing.",
		'job_bank:downloadfailed' => "Sorry; this job listing is not available at this time.",
		'job_bank:deletefailed' => "Your job listing could not be deleted at this time.",
		'job_bank:noaccess' => "You do not have permissions to change this job listing",
		'job_bank:cannotload' => "There was an error uploading the job listing",
		'job_bank:nolisting' => "You must select a job listing",
);

add_translation("en", $english);
