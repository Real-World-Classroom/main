<?php

// set the title
$title = "How to Supply Valuable Feedback";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/feedback_tab.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/feedback_window.png";

// fill remainder of column with feedback info
$content .= elgg_echo('
	<img id="feedback-pic1" src="' . "$pic1_src" . '" alt="Feedback Tab">
	<div id="first-feedback-div" class="walkthrough-text">
		The feedback tab is available on the far lefthand side of any page, and the more often it 
		gets used the more it helps us, so whenever you have something to say please let us know! 
		You don\'t have to be logged in to use it, so visitors are welcome to share their thoughts too.
	</div>
	<div id="feedback-div2" class="walkthrough-text">
		Click the tab and a window like this will pop up beside it. 
		Select the right categories to fit your feedback message, 
		and if you\'re a visitor you can optionally give a name or email.
		(If logged in it automatically gets populated with your info.)
	</div>
	<img id="feedback-pic2" src="' . "$pic2_src" . '" alt="Feedback Window">
	<div id="feedback-div3" class="walkthrough-text">
		Then just fill in the lower box with your feedback message,
		and hit send. If it\'s a bug report, try to be as descriptive
		as possible so we can recreate the issue and pinpoint the source.
	</div>
	<div id="last-feedback-div" class="walkthrough-text">
		This project is only just getting started, and as our first users you have the unique ability 
		to help shape this site as it grows. We hope you enjoy the experience and look forward to hearing from you!
	</div>
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/logging_in">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/profile">Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/walkthrough/logging_in">Sign Up & Log In</a></li>
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li>
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
