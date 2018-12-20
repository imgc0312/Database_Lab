<?php
	require_once("libs/connMysql.php");
	require_once("libs/ourLib.php");
	global $DB_CONNECT;
	
	session_start();
	if(!isset($_SESSION['user']['id'])) {
		// 強制要登入
		header("Location: index.php");
	}
	
	$sql = "SELECT privilege, userName
	FROM user
	WHERE userId = " . ourToS($_SESSION['user']['id']) . ";";
	$result = mysqli_query($DB_CONNECT, $sql);
	$row = mysqli_fetch_assoc($result);
	$userName = $row["userName"];
	// 權限 0:student, 1:teacher, 2:admin
	if($row["privilege"] == "teacher") {
		$RANK = 1;
	}
	else if($row["privilege"] == "admin") {
		$RANK = 2;
	}
	else{
		$RANK = 0;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>數位學習系統</title>
	</head>
	<body>
		<?php
			echo getTime() . "<br>";
			echo $userName . " 您好";
		?>
		<input type="button" value="登出" onclick="window.location.href='logout.php';"/><br><br>
		<input type="button" value="課程列表" onclick="window.location.href='courseInfo.php';"/>
		<?php
			$stdContent = '<input type="button" value="個人資料" onclick="window.location.href=' . "'studentPersonalData.php';" . '"/>' .
			'<input type="button" value="我的課程" onclick="window.location.href=' . "'studentCourseList.php';" . '"/>';
			$tchContent = '<input type="button" value="我的課程" onclick="window.location.href=' . "'teacherCourseList.php';" . '"/>' .
			'<input type="button" value="上傳教材" onclick="window.location.href=' . "'materialUpload.php';" . '"/>' .
			'<input type="button" value="發送公告" onclick="window.location.href=' . "'mail.php';" . '"/>' .
			'<input type="button" value="批改成績" onclick="window.location.href=' . "'evalSelect.php';" . '"/>';
			switch($RANK) {
				case 0:
					echo $stdContent;
					break;
				case 1:
					echo $tchContent;
					break;
				case 2:
					echo '<h1>學生功能</h1><br>' . $stdContent;
					echo '<h1>教師功能</h1><br>' . $tchContent . '<br>';
					echo '出作業<br>';
					echo '更新大綱、成績計算<br><br>';
					echo '<h1>...</h1>';
					echo '超過規定繳交時間的作業，系統自動上傳到另外一區，方便老師評分<br>';
					break;
			}
		?>
	</body>
</html>
