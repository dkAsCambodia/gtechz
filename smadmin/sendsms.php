<?php

    	// Account details
    	$apiKey = urlencode('5OmgbCRGDxw-mtjUW4NZBh5hibD4uq0Amr5ty65sB8');
    	
    	// Message details
    	$numbers = array(917907272830, 917907272830);
    	$sender = urlencode('TXTLCL');
    	$message = rawurlencode('This is your signup otp: 1234');
     
    	$numbers = implode(',', $numbers);
     
    	// Prepare data for POST request
    	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
     
    	// Send the POST request with cURL
    	$ch = curl_init('https://api.textlocal.in/send/');
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response = curl_exec($ch);
    	curl_close($ch);
    	
    	// Process your response here
    	echo $response;
	
    ?>