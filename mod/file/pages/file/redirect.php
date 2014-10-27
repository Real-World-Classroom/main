<?php

if (elgg_is_logged_in()) {
	$owner = elgg_get_logged_in_user_entity();
	forward("file/owner/$owner->username");
}

else {
	forward("file/all");
}
