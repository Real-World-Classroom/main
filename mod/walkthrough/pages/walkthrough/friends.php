<?php

// set the title
$title = "How to Find Friends or Join Groups";

// start building the main column of the page with the title
$content = elgg_view_title($title);

// grab site url
$site_url = elgg_get_site_url();

// store paths to pictures
$pic1_src = "/realworldclassroom/mod/walkthrough/images/elgg_topbar_friends.png";
$pic2_src = "/realworldclassroom/mod/walkthrough/images/friends_sidebar_links.png";
$pic3_src = "/realworldclassroom/mod/walkthrough/images/members_link.png";
$pic4_src = "/realworldclassroom/mod/walkthrough/images/add_friend_button.png";
$pic5_src = "/realworldclassroom/mod/walkthrough/images/groups_link.png";
$pic6_src = "/realworldclassroom/mod/walkthrough/images/join_group_button.png";
$pic7_src = "/realworldclassroom/mod/walkthrough/images/new_group_button.png";
$pic8_src = "/realworldclassroom/mod/walkthrough/images/invite_friends_button.png";

// fill remainder of column with friends info
$content .= elgg_echo('
	<div id="first-friends-div">
		<div id="friends-pic1-container">
			<img id="friends-pic1" src="' . "$pic1_src" . '" alt="Friends Link">
		</div>
	</div>
	<div id="friends-div2" class="walkthrough-text">
		Clicking the Friends link in the top black navbar will first bring you to a page where you can view a 
		list of the people you\'ve added as friends. Use the links in the sidebar on the right to also view a 
		list of people that have added you as a friend, make different collections of friends, or invite other 
		friends to come join the site.
	</div>
	<img id="friends-pic2" src="' . "$pic2_src" . '" alt="Friends Sidebar Links">
	<div id="friends-div3" class="walkthrough-text">
		You may be wondering how to add friends in the first place. First you need to access another user\'s 
		profile, which can be done by clicking on their username wherever it might be displayed on the site.
		For example, you can view a list of all the site\'s members by clicking the 
			<img id="friends-pic3" src="' . "$pic3_src" . '" alt="Members Link"> 
		link in the main blue navbar. From here click on any username to go to that person\'s profile, or use 
		the member search functions in the sidebar on the right to find a specific user. Once on a user\'s profile, click the 
			<img id="friends-pic4" src="' . "$pic4_src" . '" alt="Add Friend Button"> 
		button underneath their user photo to add them as a friend.
	</div>
	<div id="friends-div4" class="walkthrough-text">
		This site also holds the capability for users to form various groups for any number of purposes. 
		You can view a list of all groups on the site by clicking the 
			<img id="friends-pic5" src="' . "$pic5_src" . '" alt="Groups Link"> 
		link in the main blue navbar. Similarly as with members, you can search for specific groups from within the sidebar 
		on the right, but you can also easily navigate to groups you are part of or have started. To join a group, click on 
		that group\'s name to go to its homepage, and then click the 
			<img id="friends-pic6" src="' . "$pic6_src" . '" alt="Join Group Button"> 
		button in the top-right corner.
	</div>
	<div id="last-friends-div" class="walkthrough-text">
		If you are looking to form a group on the other hand, go back to the Groups main page and then click the 
			<img id="friends-pic7" src="' . "$pic7_src" . '" alt="New Group Button"> 
		button in the top-right corner to continue to a page where you can customize and create your new group. Once you\'ve 
		created it, you can visit your group homepage and use the 
			<img id="friends-pic8" src="' . "$pic8_src" . '" alt="Invite Friends Button"> 
		button to invite others to join it.
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
		<li><a href="/realworldclassroom/walkthrough/portfolio">View/Upload to Your Portfolio</a></li>
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
