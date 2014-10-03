<?php

// set the title
$title = "How to Change Your User Settings";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/elgg_topbar_settings.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/notifications_link.png";
$pic3_src = "/realworldclassroom/mod/walkthrough/images/personal_notifications_setting.png";

// fill remainder of column with settings info
$content .= elgg_echo('
	<div id="first-settings-div">
		<div id="settings-pic1-container">
			<img id="settings-pic1" src="' . "$pic1_src" . '" alt="Settings Link">
		</div>
	</div>
	<div id="settings-div2" class="walkthrough-text">
		Last but not least, additional user preferences can be accessed through the 
		Settings link on the righthand side of the top black navbar. Here you can change 
		your display name, password, and email address if desired.
	</div>
	<img id="settings-pic2" src="' . "$pic2_src" . '" alt="Notifications Link">
	<div id="settings-div3" class="walkthrough-text">
		You can change your notification settings by clicking the notifications link in the sidebar on the right. 
		If desired, it\'s also possible to independently control notifications for specific friends or groups.
	</div>
	<img id="settings-pic3" src="' . "$pic3_src" . '" alt="Personal Notifications Setting">
	<div id="last-settings-div" class="walkthrough-text">
		That\'s it for this tutorial, we hope it may have answered some of your questions. 
		Be sure to let us know through the feedback tab if there\'s anything else you\'d like to 
		see added to it, thanks again and we hope you enjoy using the site!
	</div>
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/more">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . '">Home
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/walkthrough/logging_in">Sign Up & Log In</a></li>
		<li><a href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li>
		<li><a href="/realworldclassroom/walkthrough/profile">View/Customize Your Profile</a></li>
		<li><a href="/realworldclassroom/walkthrough/portfolio">View/Upload to Your Portfolio</a></li>
		<li><a href="/realworldclassroom/walkthrough/guiding_questions">Answer Guiding Questions</a></li>
		<li><a href="/realworldclassroom/walkthrough/friends">Find Friends or Join Groups</a></li>
		<li><a href="/realworldclassroom/walkthrough/more">Add Bookmarks, Videos & More</a></li>
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/settings">Change Your User Settings</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
