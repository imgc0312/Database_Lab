<?php //學生資料 個人資料 (可供修改) 
require("connMysql.php");
global $DB_CONNECT;
session_start();
$newBirthday=$_POST['Birthday'];
$newEmail=$_POST['Email'];

if(isset($newBirthday)){
	$sql = 'UPDATA student
	SET Birthday = ' . $newBirthday . '
	WHERE id = ' . $_SESSION['user']['id'];
	mysqli_query($DB_CONNECT, $sql);
}

if(isset($newEmail)){
	$sql = 'UPDATA student
	SET Email = ' . $newEmail . '
	WHERE id = ' . $_SESSION['user']['id'];
	mysqli_query($DB_CONNECT, $sql);
}

header("location:studentPersonalData.php");
?>
