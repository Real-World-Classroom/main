<?php

elgg_register_event_handler('init', 'system', 'api_test_init');

function api_test_init() {
    expose_function("test.echo",
                "my_echo",
                 array("string" => array('type' => 'string')),
                 'A testing method which echos back a string',
                 'GET',
                 false,
                 false
                );
    expose_function("users.active",
                "count_active_users",
                 array("minutes" => array('type' => 'int',
                                          'required' => false)),
                 'Number of users who have used the site in the past x minutes',
                 'GET',
                 true,
                 false
                );
    expose_function("thewire.post",
                "my_post_to_wire",
                 array("text" => array('type' => 'string')),
                 'Post to the wire. 140 characters or less',
                 'POST',
                 true,
                 true
                );
    expose_function("test.tokenrequest",
                "test_token_request",
                 array("username" => array('type' => 'string'),
                 	   "password" => array('type' => 'string')),
                 'A GET form of the auth_gettoken() method in web_services.php',
                 'GET',
                 false,
                 false
                );
    expose_function("test.secureaccess",
                "test_secure_access",
                 array("string" => array('type' => 'string')),
                 'A testing method that requires both API and user authentication',
                 'GET',
                 true,
                 true
                );
    expose_function("user.getphoto",
                "get_user_photo",
                 array("username" => array('type' => 'string'),
                       "size" => array('type' => 'string')),
                 'Returns URL for user\'s photo given a username/email address and an optional size (\'small\' if not provided)',
                 'GET',
                 false,
                 true
                );
    expose_function("user.getdescription",
                "get_user_profile_description",
                 array("username" => array('type' => 'string')),
                 'Returns user description including custom fields depending on profile type',
                 'GET',
                 false,
                 true
                );
}

function my_echo($string) {
    return $string;
}

function count_active_users($minutes=10) {
    $seconds = 60 * $minutes;
    $count = count(find_active_users($seconds, 9999));
    return $count;
}

function my_post_to_wire($text) {

    $text = substr($text, 0, 140);

    $access = ACCESS_PUBLIC;

    // returns guid of wire post
    return thewire_save_post($text, $access, "api");
}

function test_token_request($username, $password) {
        // check if username is an email address
    if (is_email_address($username)) {
        $users = get_user_by_email($username);
            
        // check if we have a unique user
        if (is_array($users) && (count($users) == 1)) {
            $username = $users[0]->username;
        }
    }
    
    // validate username and password
    if (true === elgg_authenticate($username, $password)) {
        $token = create_user_token($username);
        if ($token) {
            return $token;
        }
    }

    throw new SecurityException(elgg_echo('SecurityException:authenticationfailed'));
}

function test_secure_access($string) {
    return 'Your string - "' . $string . '" - is now on lockdown.';
}

function get_user_photo($username, $size) {
        // check if username is an email address
    if (is_email_address($username)) {
        $users = get_user_by_email($username);
            
        // check if we have a unique user
        if (is_array($users) && (count($users) == 1)) {
            $username = $users[0]->username;
        }
    }
    
    // Get the ElggUser instance from the username
    $user = get_user_by_username($username);

    // Make sure size is valid
    if (!in_array($size, array('topbar', 'tiny', 'small', 'medium', 'large', 'master'))) {
        $size = 'medium';
    }
    
    // If valid user, return a URL for that user's photo in the given size
    if ($user) {
        return $user->getIconURL($size);
    }

    return false;
}

function get_user_profile_description($username) {
        // check if username is an email address
    if (is_email_address($username)) {
        $users = get_user_by_email($username);
            
        // check if we have a unique user
        if (is_array($users) && (count($users) == 1)) {
            $username = $users[0]->username;
        }
    }
    
    // Get the ElggUser instance from the username
    $user = get_user_by_username($username);

    // Adapt profile manager mod's function of returning the profile details view
    $about = "";
    if ($user->isBanned()) {
        $about .= "<p class='profile-banned-user'>BANNED</p>";
    } else {
        if ($user->description) {
            // see if we have a custom title
            $description_field = elgg_get_entities_from_metadata(array(
                'type' => 'object',
                'subtype' => 'custom_profile_field',
                'metadata_name_value_pairs' => array(
                    'name' => 'metadata_name',
                    'value' => 'description'
                ),
                'limit' => 1
            ));
            
            if ($description_field) {
                $title = $description_field[0]->getTitle();
            }
            else {
                $title = elgg_echo('profile:aboutme');
            }
            $about .= "<p class='profile-aboutme-title'><b>{$title}</b></p>";
            $about .= "<div class='profile-aboutme-contents'>";
            $about .= elgg_view('output/longtext', array('value' => $user->description, 'class' => 'mtn'));
            $about .= "</div>";
        }
    }
    
    $final_result = '<div id="profile-details" class="elgg-body pll">';
    $final_result .= "<h2>{$user->name}</h2>";

    $final_result .= elgg_view("profile/status", array("entity" => $user));

    $description_position = elgg_get_plugin_setting("description_position", "profile_manager");
    $show_profile_type_on_profile = elgg_get_plugin_setting("show_profile_type_on_profile", "profile_manager");
    
    if($description_position == "top"){
        $final_result .= $about;
    }
    
    $categorized_fields = profile_manager_get_categorized_fields($user);
    $cats = $categorized_fields['categories'];
    $fields = $categorized_fields['fields'];
    
    $details_result = "";
    
    if($show_profile_type_on_profile != "no"){
        if($profile_type_guid = $user->custom_profile_type){
            if(($profile_type = get_entity($profile_type_guid)) && ($profile_type instanceof ProfileManagerCustomProfileType)){
                $details_result .= "<div class='even'><b>Profile Type</b>: " . $profile_type->getTitle() . " </div>";
            }
        }
    }
    
    if(count($cats) > 0){
                
        // only show category headers if more than 1 category available
        if(count($cats) > 1){
            $show_header = true;
        } else {
            $show_header = false;
        }
        
        foreach($cats as $cat_guid => $cat){
            $cat_title = "";
            $field_result = "";
            $even_odd = "even";
            
            if($show_header){
                // make nice title
                if($cat_guid == -1){
                    $title = "System (admin only)";
                } elseif($cat_guid == 0){
                    if(!empty($cat)){
                        $title = $cat;
                    } else {
                        $title = "Default";
                    }
                } elseif($cat instanceof ProfileManagerCustomFieldCategory) {
                    $title = $cat->getTitle();
                } else {
                    $title = $cat;
                }
                
                $params = array(
                    'text' => ' ',
                    'href' => "#",
                    'class' => 'elgg-widget-collapse-button',
                    'rel' => 'toggle',
                );
                $collapse_link = elgg_view('output/url', $params);
                
                $cat_title = "<h3>" . $title . "</h3>\n";
            }
            
            foreach($fields[$cat_guid] as $field){
                
                $metadata_name = $field->metadata_name;
                
                if($metadata_name != "description"){
                    // give correct class
                    if($even_odd != "even"){
                        $even_odd = "even";
                    } else {
                        $even_odd = "odd";
                    }
                    
                    // make nice title
                    $title = $field->getTitle();
                    
                    // get user value
                    $value = $user->$metadata_name;
                    
                    // adjust output type
                    if($field->output_as_tags == "yes"){
                        $output_type = "tags";
                        if(!is_array($value)){
                            $value = string_to_tag_array($value);
                        }
                    } else {
                        $output_type = $field->metadata_type;
                    }
                    
                    if($field->metadata_type == "url"){
                        $target = "_blank";
                        // validate urls
                        if (!preg_match('~^https?\://~i', $value)) {
                            $value = "http://$value";
                        }
                    } else {
                        $target = null;
                    }
                    
                    // build result
                    $field_result .= "<div class='" . $even_odd . "'>";
                    $field_result .= "<b>" . $title . "</b>: ";
                    if (is_array($value)) {
                        foreach ($value as &$each) {
                            $field_result .= $each;
                        }
                    } else {
                        $field_result .= $value;
                    }
                    $field_result .= "</div>\n";
                }
            }
            
            if(!empty($field_result)){
                $details_result .= $cat_title;
                $details_result .= "<div>" . $field_result . "</div>";  
            }
        }
    }
    
    if(!empty($details_result)){
        $final_result .= "<div id='custom_fields_userdetails'>" . $details_result . "</div>";
    }
    
    if($description_position != "top"){
        $final_result .= $about;
    }

    $final_result .= '</div>';

    return $final_result;

}
