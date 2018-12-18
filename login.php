<?php
	require "loginFunc.php";
	
	session_start();
	
	$userId = filter_input(INPUT_POST, 'userId', FILTER_DEFAULT);
	$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
	
	if(login($userId, $password)) {
		header("Location:courseInfo.php");
		exit;
	}
	else {
		header("Location:loginerror.php");
		exit;
	}
?>