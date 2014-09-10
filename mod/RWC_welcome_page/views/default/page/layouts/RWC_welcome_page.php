<?php

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_desc = $site->description;

echo'
<html>
	<head>
	</head>
	<body>

		<div id="frame"> 
			 <div id="header">
			 <h1 id="welcomeHeader" class="textCentered">Welcome to ';
if (strlen($site_desc) == 0) echo "$site_name";
else echo "$site_name - $site_desc";		  
echo         '!</h1>
			 <br>
			 <h4 class="textCentered">Continue to the rest of the site <a href="http://54.187.111.184/realworldclassroom/activity/">here</a></h4><br>
			 </div>

			 <h3 class="textCentered">
			 	A short introduction...
			 </h3>
			 <br>
			 <div class="video_frame">
			 	<object class="video_object"
			 		data="http://www.youtube.com/v/a7CD3FS7kZ0">
			 	</object>
			 </div>

			 <br><br>

			 <h3 class="textCentered">
			 	How can ', "$site_name", ' help you?
			 </h3>
			 <br>
			 <div class="video_frame">
			 	<object class="video_object"
			 		data="http://www.youtube.com/v/WhXPXSMpl7Q">
			 	</object>
			 </div>

			 <br><br>

			 <div id="box1-1" class="row1 gridbox">
			 <p><font size="5"><br><br>A short introduction to the Real World Classroom!</font></p>
			 </div>

			 <div id="box1-2" class="row1 gridbox">
			 	<object class="video_object"
			 		data="http://www.youtube.com/v/a7CD3FS7kZ0">
			 	</object>
			 </div>

			 <div id="box1-3" class="row1 gridbox">
			 <p>Filler text for now</p>
			 </div>

			 <div id="box1-4" class="row1 gridbox">
			 <p>Filler text for now</p>
			 </div>
 
			 <div id="box2-1" class="row2 gridbox">
			 <p>Filler text for now</p>
			 </div>
							 
			 <div id="box2-2" class="row2 gridbox">
			 <p><font size="5"><br><br>How can the Real World Classroom help you?</font></p>
			 </div>
 
			 <div id="box2-3" class="row2 gridbox">
			 	<object class="video_object"
			 		data="http://www.youtube.com/v/WhXPXSMpl7Q">
			 	</object>
			 </div>
						 
			 <div id="box2-4" class="row2 gridbox">
			 <p>Filler text for now</p>
			 </div>
 
			 <div id="box3-1" class="row3 gridbox">
			 <p>Filler text for now</p>
			 </div>
 
			 <div id="box3-2" class="row3 gridbox">
			 <p>Filler text for now</p>
			 </div>
 
			 <div id="box3-3" class="row3 gridbox">
			 <p>Filler text for now</p>
			 </div>
 
			 <div id="box3-4" class="row3 gridbox">
			 <p>Filler text for now</p>
			 </div>
 
			 <div id="box4-1" class="row4 gridbox">
			 <p>Filler text for now</p>
			 </div>
 
			 <div id="box4-2" class="row4 gridbox">
			 <p>Filler text for now</p>
			 </div>

			 <div id="box4-3" class="row4 gridbox">
			 <p>Filler text for now</p>
			 </div>

			 <div id="box4-4" class="row4 gridbox">
			 <p>Filler text for now</p>
			 </div>

		</div>

	</body>
</html>';
