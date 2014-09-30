<?php

// set the title
$title = "How to View/Upload to Your Portfolio";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/portfolio_link.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/my_portfolio.png";
$pic3_src = "/realworldclassroom/mod/walkthrough/images/mine_tab.png";
$pic4_src = "/realworldclassroom/mod/walkthrough/images/file_upload_button.png";
$pic5_src = "/realworldclassroom/mod/walkthrough/images/access_privileges.png";

// fill remainder of column with portfolio info
$content .= elgg_echo('
	<div id="first-portfolio-div" class="walkthrough-text">
		To access your portfolio, first click on the  
			<img id="portfolio-pic1" src="' . "$pic1_src" . '" alt="Portfolio Link"> 
		link within the navbar along the bottom of the site\'s main blue banner. This will bring you to a page 
		where you can not only view your own submissions, but also any submissions your friends share with you, 
		as well as anything made public by other users of the site.
	</div>
	<img id="portfolio-pic2" src="' . "$pic2_src" . '" alt="Portfolio Page">
	<div id="portfolio-div2" class="walkthrough-text">
		Along the top-left portion of this page you\'ll see three tabs you can use to navigate between viewing 
		all site submissions, your own portfolio, or your friends\' portfolios. Click the 
		<img id="portfolio-pic3" src="' . "$pic3_src" . '" alt="Mine Tab"> 
		tab to view your portfolio.
	</div>
	<div id="portfolio-div3" class="walkthrough-text">
		<span style="position:relative;top:10px;">Unless you\'ve already submitted something, you can expect 
		to find the contents of this tab</span> pretty empty (and boring). To liven things up, use the 
			<img id="portfolio-pic4" src="' . "$pic4_src" . '" alt="Upload Button"> 
		button in the top-right corner to start building your portfolio. This will bring you to an upload page 
		where you can select any file you want to upload from your computer, then give it a title, 
		description, and even tags if you like.
	</div>
	<div id="last-portfolio-div" class="walkthrough-text">
		One last important thing to be aware of is the access privileges, which you can set at the bottom of 
		the file upload page. Remember that anything you submit as public will be viewable by everyone (even 
		users without accounts) so upload responsibly. If you don\'t want your submission posted publicly, you 
		can choose to have it accessible by logged in users only, your friends only, or just yourself (private).
	</div>
	<img id="portfolio-pic5" src="' . "$pic5_src" . '" alt="Access Privileges">
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/profile">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/guiding_questions">Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/walkthrough/logging_in">Sign Up & Log In</a></li>
		<li><a href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li>
		<li><a href="/realworldclassroom/walkthrough/profile">View/Customize Your Profile</a></li>
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/portfolio">View/Upload to Your Portfolio</a></li>
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
