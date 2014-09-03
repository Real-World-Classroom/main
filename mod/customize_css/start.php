<?php
/**
 * Customize CSS
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Matt Beckett
 * @copyright Matt Beckett 2012
 * 
 * This plugin does nothing by itself.  It is simply meant as a starter plugin for those unfamiliar with
 * Elgg that need to make small adjustments to the css.
 * It provides the correct method of extending the css view, changing the core files is highly discouraged
 */

// the init function contains all of our code that we want the Elgg system to do during system initialization
function customize_css_init() {
  
    // Set the priority of the css - this tells Elgg when to include your rules
    // The higher the number, the later in the sequence your css is included
    // order for plugins with the same priority is determined by their order on the plugin page
    // plugins are loaded top-to-bottom
    // so if you want to force your css to be the last thing included (to override everything else)
    // you should set the priority to 1000 and move this plugin to the very bottom of the list
    $priority = 500;

	// Extend system CSS with our own styles
	// this function is extending the view called "css/elgg" with our own custom view
	// called "customize_css/css"
	// this means that Elgg's css can remain unchanged, and our css will be included afterward
	// so any changes we want to make will overwrite the default styles
	elgg_extend_view('css/elgg','customize_css/css', $priority);

	// the view name indicates where the file can be found
	// our customize_css/css view will be found in our plugin at
	// views/default/customize_css/css.php
	// it is in this file you can safely make changes
}

// registering the event handler tells Elgg to execute a specific function at a specific time
// in this case it will execute the function customize_css_init()
// and it will do so during the initialization of the system
elgg_register_event_handler('init','system','customize_css_init');
?>