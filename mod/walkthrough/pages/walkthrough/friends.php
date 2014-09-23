<?php

// set the title
$title = "How to Find Friends or Join Groups";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// fill remainder of column with friends info
$content .= elgg_echo('
	<div style="font: 16px Georgia, serif;text-align:center;line-height:1.5;margin-bottom:15px;">
		Under construction...
	</div>
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/guiding_questions">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/more">Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/walkthrough/logging_in">Sign Up & Log In</a></li>
		<li><a href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li>
		<li><a href="/realworldclassroom/walkthrough/profile">View/Customize Your Profile</a></li>
		<li><a href="/realworldclassroom/walkthrough/portfolio">Upload/Share Your Portfolio</a></li>
		<li><a href="/realworldclassroom/walkthrough/guiding_questions">Answer Guiding Questions</a></li>
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/friends">Find Friends or Join Groups</a></li>
		<li><a href="/realworldclassroom/walkthrough/more">Add Bookmarks, Videos & More</a></li>
		<li><a href="/realworldclassroom/walkthrough/settings">Change Your User Settings</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
