<?php
	require_once("libs/connMysql.php");
	require_once("libs/ourLib.php");
	global $DB_CONNECT;
	
	if($_GET["course"] == "") {
		echo "<script language=javascript>";
		echo "alert('請選擇課程！');";
		echo "history.back();";
		echo "</script>";
		exit;
	}
	$course = $_GET["course"];
	
	$sql = "SELECT HwName, EndTime
	FROM hw
	WHERE CourseCode = " . ourToS($course) .
	" ORDER BY HwName, StartTime;";
	$hwEndTime = mysqli_query($DB_CONNECT, $sql);
	
	$sql = "SELECT HwName, StuID, Time, Score
	FROM hwsubmit
	WHERE CourseCode = " . ourToS($course) .
	" ORDER BY HwName, Time;";
	$hwResult = mysqli_query($DB_CONNECT, $sql);
	
	$sql = "SELECT StuID, Score
	FROM coursesel
	WHERE Code = " . ourToS($course) .
	" ORDER BY StuID;";
	$semester = mysqli_query($DB_CONNECT, $sql);
	
	$sql = "SELECT NameCh, NameEn
	FROM course
	WHERE Code = " . ourToS($course) .
	" ORDER BY Code;";
	$courseResult = mysqli_query($DB_CONNECT, $sql);
	$courseName = mysqli_fetch_assoc($courseResult);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>批改成績</title>
	</head>
	<body>
		<button onclick="location.href='home.php'">回首頁</button>
		<form method="post" action="evalUpdate.php">
			<?php
				echo $courseName["NameCh"];
			?>
			作業成績
			<table border="1">
				<th style="display:none;">課程名稱</th>
				<th>作業名稱</th>
				<th>學號</th>
				<th>截止時間</th>
				<th>上傳時間</th>
				<th>分數</th>
				<?php
					$endTime = mysqli_fetch_assoc($hwEndTime);
					for($i = 0; $i < mysqli_num_rows($hwResult); ++$i) {
						$row = mysqli_fetch_assoc($hwResult);
						if($endTime["HwName"] != $row["HwName"]) {
							$endTime = mysqli_fetch_assoc($hwEndTime);
						}
						$submitDateTime = new DateTime($row["Time"]);
						$hwDateTime = new DateTime($endTime["EndTime"]);
						if($submitDateTime > $hwDateTime) {
							echo '<tr bgcolor="red">';
						}
						else {
							echo '<tr>';
						}
						echo '<td style="display:none;"><input type="hidden" name="course" value="' . $course .'" readonly="readonly"></td>';
						echo '<td><input type="text" name="name1[]" value="' . $row["HwName"] .'" readonly="readonly"></td>';
						echo '<td><input type="text" name="id1[]" value="' . $row["StuID"] .'" readonly="readonly"></td>';
						echo '<td><input type="text" value="' . $endTime["EndTime"] .'" readonly="readonly"></td>';
						echo '<td><input type="text" value="' . $row["Time"] .'" readonly="readonly"></td>';
						echo '<td><input type="text" name="score1[]" value="' . $row["Score"] . '" maxlength="3"/></td>';
						echo '</tr>';
					}
				?>
			</table><br>
			<?php
				echo $courseName["NameCh"];
			?>
			學期成績
			<table border="1">
				<th style="display:none;">課程名稱</th>
				<th>學號</th>
				<th>分數</th>
				<?php
					for($i = 0; $i < mysqli_num_rows($semester); ++$i) {
						$row = mysqli_fetch_assoc($semester);
						echo "<tr>";
						echo '<td style="display:none;"><input type="hidden" name="course" value="' . $course .'" readonly="readonly"></td>';
						echo '<td><input type="text" name="id2[]" value="' . $row["StuID"] .'" readonly="readonly"></td>';
						echo '<td><input type="text" name="score2[]" value="' . $row["Score"] . '" maxlength="3"/></td>';
						echo "</tr>";
					}
				?>
			</table>
			<input type="submit" value="確認修改" name="submit">
		</form><br>
	</body>
</html>
