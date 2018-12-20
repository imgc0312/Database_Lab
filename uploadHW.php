<?php
	require("libs/connMysql.php");
	require("libs/ourLib.php");
	global $DB_CONNECT;
	session_start();
	$Code = $_POST['Code'];
	$hwname = $_POST['hwname'];
	$UID = $_SESSION['user']['id'];
	$target_Path = "HW";
	$target_Name = rawurlencode("$Code.$hwname.$UID");// 依RFC 3986進行編碼, 解決中文問題
	
	function failed($message){
		$alertMessage = 'upload failed !!' . '<br />' . '<pre>' . $message . '</pre>';
		echo "<script>
				alert($alertMessage);
				history.back();
			</script>";
	}
	
	if($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK){
		$dest = $target_Path . "/$target_Name." . pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
		
			// 檔案上傳
			// 會先放在暫存檔中$_FILES["fileToUpload"]["tmp_name"]
		
		$file = $_FILES["fileToUpload"]["tmp_name"];
			// 將檔案移至指定位置
		move_uploaded_file($file, $dest);
		$sql = "INSERT INTO hwsubmit(CourseCode, HwName, StuID, Time)
				VALUES(".ourToS($Code).", ".ourToS($hwname).", ".ourToS($UID).", ".ourToS(getTime()).")
				ON DUPLICATE KEY UPDATE Time = " . ourToS(getTime());

		mysqli_query($DB_CONNECT, $sql);
		
		echo "<script>
				alert('upload successed !!');
				history.back();
			</script>";
	}
	else{//上傳失敗
		failed("fileToUpload error");
	}
	
	failed("unknown Exception error");
?>