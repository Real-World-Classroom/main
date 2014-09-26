<?php

// set the title
$title = "How to Use This Site";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// if user is not logged in, show link to registration, else just text
if (!elgg_is_logged_in()) {$sign_up = elgg_echo('<a href="' . "$site_url" . 'register">sign up</a>');} 
else {$sign_up = elgg_echo('sign up');}

// fill remainder of column with welcome info
$content .= elgg_echo('
	<div id="first-welcome-div">
		Welcome to our pilot app!
	</div>
	<div class="walkthrough-text welcome-body-div">
		This is a networking site geared towards students, faculty, and alumni of SUNY Ulster,
		as well as for potential employers or other involved members of the community.
	</div>
	<div class="walkthrough-text welcome-body-div">
		We invite you to ' . "$sign_up" . ' and take a look around, and hope you will
		let us know of any problems or suggestions by using the feedback tab, located on the left.
	</div>
	<div class="walkthrough-text welcome-body-div">
		The rest of this tutorial steps through the basics of using various functions of the site,
		feel free to browse through it or just jump right in and start trying things out.
	</div>
	<div id="last-welcome-div" class="walkthrough-text">
		Thanks for your participation in this pilot program,
		we hope you find it useful and have fun!
	</div>
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/logging_in">Next
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
		<li><a href="/realworldclassroom/walkthrough/settings">Change Your User Settings</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
