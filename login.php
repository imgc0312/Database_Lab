<?php
	require_once "libs/loginFunc.php";
	
	session_start();
	
	$userId = filter_input(INPUT_POST, 'userId', FILTER_DEFAULT);
	$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
	
	if(login($userId, $password)) {
		header("Location:home.php");
		exit;
	}
	else {
		header("Location:loginerror.php");
		exit;
	}
?>