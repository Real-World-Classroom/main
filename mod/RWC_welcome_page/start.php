<?php

elgg_register_event_handler('init', 'system', 'RWC_welcome_page_init');

function RWC_welcome_page_init() {
	elgg_register_plugin_hook_handler('index', 'system', 'new_index');
}

function new_index() {
	if (!include_once(dirname(__FILE__) . "/RWC_welcome_page.php")) {
		return false;
	}
	return true;
}
