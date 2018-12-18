<?php
	require "config.php";
	
	$DB_CONNECT = mysqli_connect(DB_LOCATION, DB_ID, DB_PASS, DB_NAME)
					or die("MySQL connection error");
	mysqli_query($DB_CONNECT, "SET NAMES 'utf8'");  // 設定字元集與編碼為utf8
?>
