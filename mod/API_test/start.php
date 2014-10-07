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
                 'A method to test the auth.gettoken api method',
                 'GET',
                 false,
                 false
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
	$url = 'http://localhost/realworldclassroom/services/api/rest/xml/';
	$postData = array();
	$postData['method'] = 'auth.gettoken';
	$postData['username'] = $username;
	$postData['password'] = $password;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
