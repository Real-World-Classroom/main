<?php
/*
 * 	This is a php file, yet it contains css
 * 	This is normal for Elgg, it's part of the views system
 * 	Simply add your css rules to this file
 * 	Remember to clear your cache, or you may not see the changes right away
 * 	Cache can be cleared using the button on the administration page
 * 	or by visiting <your_url>/upgrade.php
 * 
 * 	For your reference, the full elgg default css is included
 * 	in views/default/customize_css/reference
 * 
 * 	It is spread over a number of php files, but they are structured by what
 * 	the css is affecting.
 * 
 * 	Remember that themes and other plugins also override the default css
 * 	if you find that your changes aren't working check the order of the plugins
 * 	and check your $priority setting in start.php
 * 
 * 	(also check that you're creating/modifying the correct rules)
 */
?>

.row1{
background-color:#50A6C2;
}

.row2{
background-color:#0054a7;
}

.row3{
background-color:#71b9f7;
}

.row4{
background-color:#4690d6;
}

.gridbox{
float:left;
clear:none;
position:relative;
width:25%;
height:480px;
}

#header{
margin-top:25px;
width:100%;
height:80px;
}

.video_object{
width:100%;
height:100%;
}

.editorBox{
float:left;
clear:none;
position:relative;
width:23%;
height:240px;
margin-left:1%;
margin-right:1%;
margin-top:10px;
}

.textInput{
width:90%;
height:60%;
margin-left:3%;
}

.textCentered{
text-align:center;
}

#editorFrame{
margin-left:15%;
margin-right:15%;
}

#editorFooter{
float:left;
position:relative;
width:100%;
height:120px;
clear:both;
}

#editorHeader{
margin-top:50px;
}

.video_frame{
width:48%;
height:450px;
margin: 0 1% 7% 1%;
float:left;
}
