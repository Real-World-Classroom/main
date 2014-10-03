<?php

// set the title
$title = "How to Sign Up & Log In";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/login_button.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/login_screen.png";

// fill remainder of column with login info
$content .= elgg_echo('
	<div id="first-login-div" class="walkthrough-text">
		To register for a new account or log in to a pre-existing account, look for a button like this 
			<img id="login-pic1" src="' . "$pic1_src" . '" alt="Login Button"> 
		in the top-right portion of the site\'s blue banner above.
	</div>
	<div id="login-div2" class="walkthrough-text">
		<div>
			If you are a first-time user, click the "Register" link in the bottom-left corner of the menu that drops down. 
			You will then be directed to the registration page where you can create your new account.
		</div>
		<div>
			Otherwise, enter the username and password that you previously registered with and click "Log in".
		</div>
	</div>
	<div id="login-div3">
		<img id="login-pic2" src="' . "$pic2_src" . '" alt="Login Screen"> 
	</div>
	<div id="last-login-div" class="walkthrough-text">
		If you ever forget your password, you can use the Lost Password link to request a new one for your account. 
		You\'ll first receive an email with a link to a password reset page. (Make sure to check your spam folder in case 
		it accidentally lands there.) Click the button on that page to receive another email with your new password. 
		You can then log in with this password and change it to whatever you like from the settings page 
		(see <a href="' . "$site_url" . 'walkthrough/settings">here</a>).
	</div>
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/welcome">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/feedback">Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/logging_in">Sign Up & Log In</a></li>
		<li><a href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li>
		<li><a href="/realworldclassroom/walkthrough/profile">View/Customize Your Profile</a></li>
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
