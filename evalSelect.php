<?php
	// 老師評分 作業+學期成績
	require_once("libs/connMysql.php");
	require_once("libs/ourLib.php");
	global $DB_CONNECT;
	
	session_start();
	
	$sql = "SELECT course.Code, course.NameCh, course.NameEn
	FROM course, teacher
	WHERE teacher.ID = " . ourToS($_SESSION['user']['id']) . " AND
	course.Instructor = teacher.TchName
	ORDER BY course.Code;";
	$result = mysqli_query($DB_CONNECT, $sql);
	$courseNum = mysqli_num_rows($result);
	
	if($courseNum == 0) {
		echo "<script language=javascript>";
		echo "alert('無課程！');";
		echo "history.back();";
		echo "</script>";
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>批改成績</title>
	</head>
	<body>
		<button onclick="location.href='home.php'">回首頁</button>
		<br><br>
		<form method="get" action="eval.php">
			選擇課程：<input list="courseList" name="course"/>
			<datalist id="courseList">
				<?php
					for($i = 0; $i < $courseNum; ++$i) {
						$row = mysqli_fetch_assoc($result);
						echo "<option value=" . ourToS($row["Code"]) . " label=" . ourToS($row["NameCh"]) . "/>";
					}
				?>
			</datalist>
			<input type="submit" value="確定" name="submit">
		</form>
	</body>
</html>
