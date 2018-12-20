<?php
	require_once("libs/connMysql.php");
	require_once("libs/ourLib.php");
	global $DB_CONNECT;
	
	$course = $_POST["course"];
	$hwName = $_POST["name1"];
	$hwStuId = $_POST["id1"];
	$hwScore = $_POST["score1"];
	for($i = 0; $i < count($hwScore); ++$i) {
		$sql = "UPDATE hwsubmit
		SET Score = " . $hwScore[$i] .
		" WHERE CourseCode = " . ourToS($course) .
		" AND HwName = " . ourToS($hwName[$i]) .
		" AND StuID = " . ourToS($hwStuId[$i]) . ";";
		echo $sql . "<br>";
		mysqli_query($DB_CONNECT, $sql);
	}
	
	$semStuId = $_POST["id2"];
	$semScore = $_POST["score2"];
	for($i = 0; $i < count($semScore); ++$i) {
		$sql = "UPDATE coursesel
		SET Score = " . $semScore[$i] .
		" WHERE StuID = " . ourToS($semStuId[$i]) .
		" AND Code = " . ourToS($course) . ";";
		mysqli_query($DB_CONNECT, $sql);
	}
	
	header("Location: evalSelect.php");
?>
