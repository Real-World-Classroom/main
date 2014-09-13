<?php

// set the title
$title = "How to Sign Up & Log On";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

//store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/login_button.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/login_screen.png";

// fill remainder of column with logon info
$content .= elgg_echo('
	<div style="font: 16px Georgia, serif;text-align:center;margin: 30px 0 15px 0;">
		To register for a new account or logon with a pre-existing account,<br>look for a button like this 
			<img src="' . "$pic1_src" . '" alt="Login Button" style="width:10%;position:relative;top:8px;margin: 0 10px;"> 
		in the top-right corner of the site\'s header above.
	</div>
	<div style="line-height:1.5;">
		<div style="font: 16px Georgia, serif;text-align:center;line-height:2.0;margin: 2% 0 15px 10%;width:55%;float:left;">
			<div style="margin-bottom:5%;">
				If you are a first-time user, click the "Register" link in the bottom-left corner of the menu that drops down.
				<br>You will then be directed to the registration page where you can create your new account.
			</div>
			<div>
				Otherwise, enter the username and password you registered with and click "Log in".
			</div>
		</div>
		<div style="width:30%;float:right;margin-right:3%;">
			<img src="' . "$pic2_src" . '" alt="Login Screen" style="width:100%;"> 
		</div>
	</div>
	<div style="font: 16px Georgia, serif;text-align:center;line-height:2.0;margin: 1% 0 9% 0;width:100%;display:inline-block;">
		<span style="color:red;">NOTE:</span> We are currently unable to send email validations, and are working to fix the problem.
		<br>You can use your account without it being validated, but if you would like validation
		<br>then please send us a feedback message requesting validation for your account.
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
