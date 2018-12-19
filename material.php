<?php
	require("libs/connMysql.php");
	require("libs/ourLib.php");
	global $DB_CONNECT;
	
	session_start();
	
	$sql = "SELECT material.FileName, material.CourseCode
	FROM material, student, coursesel
	WHERE student.ID = " . ourToS($_SESSION['user']['id']) . " AND
	student.ID = coursesel.StuID AND
	coursesel.Code = material.CourseCode
	ORDER BY material.ID;";
	$result = mysqli_query($DB_CONNECT, $sql);
	
	for($i = 0; $i < mysqli_num_rows($result); ++$i) {
		$row = mysqli_fetch_assoc($result);
		// download link with filename
		echo "<a href='materialDownload.php";
		echo "?course=" . $row["CourseCode"];
		echo "&filename=" . $row["FileName"] . "'>" . rawurldecode($row['FileName']) . "</a><br>";
	}
?>
