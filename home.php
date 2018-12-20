<?php
	require("libs/ourLib.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>首頁</title>
	</head>
	<body>
		<?php echo getTime() . "<br>"; ?>
		你好<br>
		<input type="button" value="課程列表" onclick="window.location.href='courseInfo.php';"/>
		<h1>學生功能</h1><br>
		<input type="button" value="個人資料" onclick="window.location.href='studentPersonalData.php';"/>
		<input type="button" value="我的課程" onclick="window.location.href='studentCourseList.php';"/>
		<h1>教師功能</h1><br>
		出作業<br>
		更新大綱、成績計算<br>
		輸入成績<br><br>
		<input type="button" value="發送公告" onclick="window.location.href='mail.php';"/>
		<input type="button" value="上傳教材" onclick="window.location.href='materialUpload.php';"/>
		<h1>...</h1>
		超過規定繳交時間的作業，系統自動上傳到另外一區，方便老師評分<br>
		<input type="button" value="登出" onclick="window.location.href='logout.php';"/>
	</body>
</html>
