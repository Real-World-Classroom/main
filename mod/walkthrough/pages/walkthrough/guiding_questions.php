<?php

// set the title
$title = "How to Answer Guiding Questions";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/guiding_questions_link.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/save_answers_button.png";
$pic3_src = "/realworldclassroom/mod/walkthrough/images/past_answers_button.png";
$pic4_src = "/realworldclassroom/mod/walkthrough/images/present_answer_example.png";
$pic5_src = "/realworldclassroom/mod/walkthrough/images/past_answer_example.png";
$pic6_src = "/realworldclassroom/mod/walkthrough/images/all_past_answers_link.png";

// fill remainder of column with guiding questions info
$content .= elgg_echo('
	<div id="first-guiding-questions-div" class="walkthrough-text">
		The Guiding Questions page is a part of the site that\'s only accessible to logged in users. 
		First, make sure you\'re logged in, then click the  
			<img id="guiding-questions-pic1" src="' . "$pic1_src" . '" alt="Guiding Questions Link"> 
		link within the main blue navbar. Here you will see a series of questions posed to you by the 
		instructor, with text-editor boxes underneath where you can type in your answers.
	</div>
	<div id="guiding-questions-div2" class="walkthrough-text">
		Whenever you\'d like to submit any of your responses, use the 
			<img id="guiding-questions-pic2" src="' . "$pic2_src" . '" alt="Save Answers Button"> 
		button located at the bottom of the page. Please be aware that if you navigate away from this page 
		without clicking the save button then any answers you typed in will not be saved.
	</div>
	<div id="guiding-questions-div3" class="walkthrough-text">
		To view all of your past responses for a specific question, look for the 
			<img id="guiding-questions-pic3" src="' . "$pic3_src" . '" alt="Past Answers Button"> 
		<span style="position:relative;bottom:3px;">button found underneath each question on the righthand side.</span>
	</div>
	<div id="guiding-questions-div4" class="walkthrough-text">
		You may find it helpful to look back on answers you submitted from a while ago and see how things have 
		changed since then. When you view a question\'s past responses you will see that they are dated and arranged 
		in chronological order with the most recent answers at the top.
	</div>
	<img id="guiding-questions-pic4" src="' . "$pic4_src" . '" alt="Present Answer Example">
	<img id="guiding-questions-pic5" src="' . "$pic5_src" . '" alt="Past Answer Example">
	<div id="last-guiding-questions-div" class="walkthrough-text">
		You can also view all of your responses for every question in one place by clicking on the 
		"All Past Answers" link in the sidebar under the search field on the righthand side of the page.
	</div>
	<img id="guiding-questions-pic6" src="' . "$pic6_src" . '" alt="All Past Answers Link">
	<div class="walkthrough-footer">
		<a class="elgg-button elgg-button-submit walkthrough-footer-left-button" 
			href="' . "$site_url" . 'walkthrough/portfolio">Back
		</a>
		<a class="elgg-button elgg-button-submit walkthrough-footer-right-button" 
			href="' . "$site_url" . 'walkthrough/friends">Next
		</a>
	</div>');

// add navigation links for the sidebar
$sidebar = elgg_echo('<ul class="elgg-menu elgg-menu-page elgg-menu-page-default">
		<li><a href="/realworldclassroom/walkthrough/logging_in">Sign Up & Log In</a></li>
		<li><a href="/realworldclassroom/walkthrough/feedback">Supply Valuable Feedback</a></li>
		<li><a href="/realworldclassroom/walkthrough/profile">View/Customize Your Profile</a></li>
		<li><a href="/realworldclassroom/walkthrough/portfolio">View/Upload to Your Portfolio</a></li>
		<li><a class="walkthrough-active-menu-item" 
				href="/realworldclassroom/walkthrough/guiding_questions">Answer Guiding Questions</a></li>
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
