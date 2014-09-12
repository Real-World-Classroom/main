<?php
$site_url = elgg_get_site_url();
?>

<div style="font: italic bold 20px Georgia, serif;text-align:center;margin-top:15px;margin-bottom:25px;">
	Welcome to our pilot app!
</div>
<div style="font: 16px Georgia, serif;text-align:center;line-height:1.5;margin-bottom:15px">
	This is a networking site geared towards students, faculty, and alumni of SUNY Ulster,
	<br>as well as for potential employers or other involved members of the community.
</div>
<div style="font: 16px Georgia, serif;text-align:center;line-height:1.5;margin-bottom:15px">
	We invite you to 
		<?php if (!elgg_is_logged_in()) { echo'<a href="' . "$site_url" . 'register">sign up</a>'; }
		else { echo'sign up'; } ?> and take a look around, and hope you will
	<br>let us know of any problems or suggestions by using the feedback tab.
</div>
<div style="font: 16px Georgia, serif;text-align:center;line-height:1.5;margin-bottom:15px">
	The rest of this tutorial steps through the basics of using various functions of the site,
	<br>feel free to browse through it or just jump in and start trying things out.
</div>
<div style="font: 16px Georgia, serif;text-align:center;line-height:1.5;margin-bottom:15px">
	Thanks for your participation in this pilot program,
	<br>we hope you find it useful and have fun!
</div>
<div>
	<?php echo '
		<a class="elgg-button elgg-button-submit" href="' . "$site_url" . 'walkthrough/logging_on" style="float:right;margin:10px;font-size:20px;">
			Next
		</a>'; 
	?>
</div>
