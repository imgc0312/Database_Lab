<?php //學生資料 個人資料 (可供修改) 
require("libs/connMysql.php");
require("libs/ourLib.php");
global $DB_CONNECT;
session_start();
$newBirthday=$_POST['Birthday'];
$newEmail=$_POST['Email'];

if(isset($newBirthday)){
	$sql = 'UPDATE student
	SET Birthday = ' . ourToS($newBirthday) . '
	WHERE id = ' . ourToS($_SESSION['user']['id']);
	mysqli_query($DB_CONNECT, $sql);
}

if(isset($newEmail)){
	$sql = 'UPDATE student
	SET Email = ' . ourToS($newEmail) . '
	WHERE id = ' . ourToS($_SESSION['user']['id']);
	mysqli_query($DB_CONNECT, $sql);
}

header("location:studentPersonalData.php");
?>