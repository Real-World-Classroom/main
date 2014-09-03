<?php

// Initialize plugin
elgg_register_event_handler('init', 'system', 'RWC_welcome_page_init');

function RWC_welcome_page_init() {

	// Extend system CSS with our own styles
	elgg_extend_view('css/elgg', 'RWC_welcome_page/css');

	// Replace the default index page
	elgg_register_plugin_hook_handler('index', 'system', 'custom_index');
}

function custom_index($hook, $type, $return, $params) {
	if ($return == true) {
		// Another hook has already replaced the front page
		return $return;
	}

	// Attempt to include new index, but return false if failure
	if (!include_once(dirname(__FILE__) . "/index.php")) {
		return false;
	}

	// Otherwise return true to signify that we have handled the front page
	return true;
}
