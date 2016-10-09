<?php

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = preg_replace('/[^a-z0-9A-Z -]+/', '', $data);
	return $data;
}
	
	if (empty($_POST["txtuname"])){
		$txtuname_err = "Insert your username";				
		$error = true;
	}else {
		$uname = test_input($_POST["txtuname"]);
	}
	
	if (empty($_POST["txtemail"])){ 
		$txtemail_err = "Insert your email address";
		$error = true;
	}else {
		$email = filter_var($_POST["txtemail"], FILTER_VALIDATE_EMAIL);
	}
	
	if (empty($_POST["txtpass"])){
		$txtpass_err = "Insert a password";				
		$error = true;
	}else {
		$error = false;
	}
	
?>