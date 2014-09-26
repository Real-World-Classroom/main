<?php

// set the title
$title = "How to View/Customize Your Profile";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/elgg_topbar_profile.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/profile_page.png";
$pic3_src = "/realworldclassroom/mod/walkthrough/images/edit_avatar_button.png";
$pic4_src = "/realworldclassroom/mod/walkthrough/images/edit_profile_button.png";
$pic5_src = "/realworldclassroom/mod/walkthrough/images/triangle_button.png";
$pic6_src = "/realworldclassroom/mod/walkthrough/images/x_button.png";
$pic7_src = "/realworldclassroom/mod/walkthrough/images/add_widgets_button.png";

// fill remainder of column with profile info
$content .= elgg_echo('
	<div id="first-profile-div">
		<div id="profile-pic1-container">
			<img id="profile-pic1" src="' . "$pic1_src" . '" alt="Profile Link">
		</div>
	</div>
	<div id="profile-div2" class="walkthrough-text">
		If you\'re logged in, you\'ll notice an additional black navigation bar at the top of the page. 
		To view and edit your profile, click the "Profile" link on the lefthand side of this new navbar. 
		If you haven\'t done anything yet, your profile page should look something like the image here:
	</div>
	<img id="profile-pic2" src="' . "$pic2_src" . '" alt="Profile Page">
	<div id="profile-div3">
		You can click the 
			<img id="profile-pic3" src="' . "$pic3_src" . '" alt="Edit Avatar Button"> 
		button underneath the user icon in the top-left corner to upload a new user photo, or you can click the 
			<img id="profile-pic4" src="' . "$pic4_src" . '" alt="Edit Profile Button"> 
		button to share additional <span style="position:relative;top:15px;">
		information about yourself or change your profile type if desired.</span>
	</div>
	<br>
	<div id="profile-div4" class="walkthrough-text">
		The profile page also comes stocked with several widgets that you may find useful, 
		denoted by the various labeled boxes you see on the bottom and righthand sides.
	</div>
	<div id="last-profile-div">
		All widgets come enabled by default, but you can either minimize them by clicking the 
			<img id="profile-pic5" src="' . "$pic5_src" . '" alt="Minimize Button"> 
		in the left corner of the widget, or delete them by clicking the 
			<img id="profile-pic6" src="' . "$pic6_src" . '" alt="Delete Button"> 
		in the right corner. You can also add them back at any time by clicking the 
			<img id="profile-pic7" src="' . "$pic7_src" . '" alt="Add Widgets Button"> 
		button at top-right of the page.
	</div>
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/feedback">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/portfolio">Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/walkthrough/logging_in">Sign Up & Log In</a></li>
		<li><a href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li>
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/profile">View/Customize Your Profile</a></li>
		<li><a href="/realworldclassroom/walkthrough/portfolio">View/Upload to Your Portfolio</a></li>
		<li><a href="/realworldclassroom/walkthrough/guiding_questions">Answer Guiding Questions</a></li>
		<li><a href="/realworldclassroom/walkthrough/friends">Find Friends or Join Groups</a></li>
		<li><a href="/realworldclassroom/walkthrough/more">Add Bookmarks, Videos & More</a></li>
		<li><a href="/realworldclassroom/walkthrough/settings">Change Your User Settings</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
