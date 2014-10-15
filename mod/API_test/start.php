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
        return elgg_format_url($user->getIconURL($size));
    }

    return false;
}
