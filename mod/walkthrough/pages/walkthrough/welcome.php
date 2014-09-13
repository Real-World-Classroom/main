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
	<div style="font: italic bold 20px Georgia, serif;text-align:center;margin: 25px 0;">
		Welcome to our pilot app!
	</div>
	<div style="font: 16px Georgia, serif;text-align:center;line-height:2.0;margin-bottom:15px;">
		This is a networking site geared towards students, faculty, and alumni of SUNY Ulster,
		<br>as well as for potential employers or other involved members of the community.
	</div>
	<div style="font: 16px Georgia, serif;text-align:center;line-height:2.0;margin-bottom:15px;">
		We invite you to ' . "$sign_up" . ' and take a look around, and hope you will
		<br>let us know of any problems or suggestions by using the feedback tab.
	</div>
	<div style="font: 16px Georgia, serif;text-align:center;line-height:2.0;margin-bottom:15px;">
		The rest of this tutorial steps through the basics of using various functions of the site,
		<br>feel free to browse through it or just jump in and start trying things out.
	</div>
	<div style="font: 16px Georgia, serif;text-align:center;line-height:2.0;margin-bottom:8%;">
		Thanks for your participation in this pilot program,
		<br>we hope you find it useful and have fun!
	</div>
	<div style="position:absolute;bottom:0;width:90%;padding: 0 0 10px 35px;">
		<a class="elgg-button elgg-button-submit" href="' . "$site_url" . 'walkthrough/logging_on" style="float:right;margin:10px;font-size:20px;">
			Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/walkthrough/logging_on">Sign Up & Log On</a></li>
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
