<?php
	require_once("libs/connMysql.php");
	require_once("libs/ourLib.php");
	global $DB_CONNECT;
	
	if(!session_id()) {
		session_start();
	}
	
	$sql = "SELECT course.Code
	FROM course, teacher
	WHERE teacher.ID = " . ourToS($_SESSION['user']['id']) . " AND
	course.Instructor = teacher.TchName
	ORDER BY course.Code;";
	$result = mysqli_query($DB_CONNECT, $sql);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>教材上傳</title>
	</head>
	<body>
		<!--表單包含檔案上傳, enctype設為"multipart/form-data"-->
		<form method="post" enctype="multipart/form-data" action="upload.php">
			選擇課程：<input list="courseList" name="course"/>
			<datalist id="courseList">
				<?php
					for($i = 0; $i < mysqli_num_rows($result); ++$i) {
						$row = mysqli_fetch_assoc($result);
						echo "<option value=" . ourToS($row["Code"]) . "/>";
					}
				?>
			</datalist><br>
			檔案上傳：
			<!--讓網頁可以一次上傳多個檔案, 在<input>中加上multiple屬性, 並將檔案名稱加上[]-->
			<input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
			<input type="submit" value="上傳" name="upload">
		</form>
	</body>
</html>
