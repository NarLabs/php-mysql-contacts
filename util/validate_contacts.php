<?php

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = preg_replace('/[^a-z0-9A-Z -]+/', '', $data);
	return $data;
}
	
	if (empty($_POST["first_name"])){
		$first_name_err = "Insert contact's first name";				
		$error = true;
	}else {
		$first_name = test_input($_POST["first_name"]);
	}
	if (empty($_POST["last_name"])){ 
		$last_name_err = "Insert contact's last name";				
		$error = true;
	}else {
		$last_name = test_input($_POST["last_name"]);
	}
	if (empty($_POST["phone_nr"])){ 
		$phone_nr_err = "Insert contact's phone number";				
		$error = true;
	}else {
		$phone_nr = test_input($_POST["phone_nr"]);
	}
	if (empty($_POST["email"])){ 
		$email_err = "Insert contact's email address";
		$error = true;
	}else {
		$email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
	}
	
?>