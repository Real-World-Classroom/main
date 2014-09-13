<?php

// set the title
$title = "How to Sign Up & Log On";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// fill remainder of column with logon info
$content .= elgg_echo('
	<div style="font: 16px Georgia, serif;text-align:center;line-height:1.5;margin-bottom:15px;">
		Under construction...
	</div>
	<div style="position:absolute;bottom:0;width:90%;padding: 0 0 10px 35px;">
		<a class="elgg-button elgg-button-submit" href="' . "$site_url" . 'walkthrough/welcome" style="float:left;margin:10px;font-size:20px;">
			Back
		</a>
		<a class="elgg-button elgg-button-submit" href="' . "$site_url" . 'walkthrough/profile" style="float:right;margin:10px;font-size:20px;">
			Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a style="pointer-events:none;cursor:default;background-color:#A7C8E9;color:dimgrey;" 
				href="/realworldclassroom/walkthrough/logging_on">Sign Up & Log On</a></li>
		<li><a href="/realworldclassroom/walkthrough/profile">View/Customize Your Profile</a></li>
		<li><a href="/realworldclassroom/walkthrough/portfolio">Upload/Share Your Portfolio</a></li>
		<li><a href="/realworldclassroom/walkthrough/guiding_questions">Answer Guiding Questions</a></li>
		<li><a href="/realworldclassroom/walkthrough/friends">Find & Add Friends</a></li>
		<li><a href="/realworldclassroom/walkthrough/more">Add Bookmarks, Videos & More</a></li>
		<li><a href="/realworldclassroom/walkthrough/settings">Change Your User Settings</a></li>
		<li><a href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
