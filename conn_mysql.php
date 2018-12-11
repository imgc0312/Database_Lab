<?php
	require "config.php";

	session_start();
	
	$conn = mysqli_connect(DB_LOCATION, DB_ID, DB_PASS, DB_NAME)
	or die("MySQL connection error");
	
	$userId = $_REQUEST["userId"];
	$password = $_REQUEST["password"];
	
	mysqli_query($conn, "SET NAMES 'utf8'");  // 設定字元集與編碼為utf8
	$sql = "SELECT password FROM user WHERE userId = '$userId'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	// 驗證有問題
	if($row["password"] != $password) {
		header("Location:loginerror.php");
		exit;
	}
	else {
		echo "登入成功";
	}
?>
