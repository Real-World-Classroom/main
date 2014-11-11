<?php

$desc = $vars['entity']->description;
$date = elgg_view_friendly_time($vars['entity']->time_created);
echo "<div class='gq-answer'>";
if ($vars['entity']->owner_guid == elgg_get_logged_in_user_guid()) {
	echo elgg_view("output/confirmlink",array('href' => elgg_get_site_url() . "action/guiding_questions/delete?guid=" . $vars['entity']->guid, 
		'confirm' => elgg_echo('guiding_questions:delete:confirm'), 'class' => 'elgg-icon elgg-icon-delete gq-delete'));	
}
echo "$desc<span class='gq-date-color'>$date";
if (elgg_in_context('widgets')||elgg_in_context('admin')) {
	$user = get_entity($vars['entity']->owner_guid);
	$name = $user->name;
	$username = $user->username;
	echo " by <a href='/realworldclassroom/profile/$username'>$name</a>";
}
echo "</span></div>";
