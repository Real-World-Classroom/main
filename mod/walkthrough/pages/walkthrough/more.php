<?php

// set the title
$title = "How to Add Bookmarks, Videos & More";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/more_link.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/more_dropdown_links.png";
$pic3_src = "/realworldclassroom/mod/walkthrough/images/all_tabs.png";
$pic4_src = "/realworldclassroom/mod/walkthrough/images/add_bookmark_button.png";
$pic5_src = "/realworldclassroom/mod/walkthrough/images/add_video_button.png";
$pic6_src = "/realworldclassroom/mod/walkthrough/images/add_page_button.png";
$pic7_src = "/realworldclassroom/mod/walkthrough/images/post_button.png";

// fill remainder of column with more info
$content .= elgg_echo('
	<div id="first-more-div" class="walkthrough-text">
		There are a few additional capabilities of the site to be found by hovering over the 
			<img id="more-pic1" src="' . "$pic1_src" . '" alt="More Link"> 
		link in the main blue banner. Currently these include adding Bookmarks, Videos and Pages, 
		and the ability to post to a Twitter-like feature called "The Wire".
	</div>
	<img id="more-pic2" src="' . "$pic2_src" . '" alt="More Dropdown Links">
	<div id="more-div2" class="walkthrough-text">
		As with the Portfolio, use these tabs in the top-left portion of each feature 
		to filter what you want to view.
	</div>
	<img id="more-pic3" src="' . "$pic3_src" . '" alt="All, Mine, Friends Tabs">
	<div id="last-more-div" class="walkthrough-text">
		Look for buttons like these: 
			<img id="more-pic4" src="' . "$pic4_src" . '" alt="Add Bookmark Button"> 
		/ 
			<img id="more-pic5" src="' . "$pic5_src" . '" alt="Add Video Button"> 
		/ 
			<img id="more-pic6" src="' . "$pic6_src" . '" alt="Add Page Button"> 
		in the top-right corner of those respective features in order to create a new bookmark, video 
		or page. Be sure not to forget about the access privileges! To post to The Wire, simply 
		enter a message 140 characters or less into the text box and click the 
			<img id="more-pic7" src="' . "$pic7_src" . '" alt="Post Button"> 
		button below it.
	</div>
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/friends">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/settings">Next
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
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/more">Add Bookmarks, Videos & More</a></li>
		<li><a href="/realworldclassroom/walkthrough/settings">Change Your User Settings</a></li></ul>');

// layout the page
$body = elgg_view_layout('one_sidebar', array(
   'content' => $content,
   'sidebar' => $sidebar
));

// draw the page
echo elgg_view_page($title, $body);
