<?php

// Initialize plugin
elgg_register_event_handler('init', 'system', 'RWC_study_guide_init');

function RWC_study_guide_init() {

	// Extend system CSS with our own styles
	elgg_extend_view('css/elgg', 'RWC_study_guide/css');

	// Register page handler
    elgg_register_page_handler('study_guide', 'RWC_study_guide_page_handler');
}

function RWC_study_guide_page_handler() {
    include elgg_get_plugins_path() . 'RWC_study_guide/index.php';
    return true;
}
