<?php
	require("libs/connMysql.php");
	require("libs/ourLib.php");
	global $DB_CONNECT;
	
	if(isset($_POST["course"])) {
		$course = $_POST["course"];
		// 取得上傳檔案數量
		$fileCount = count($_FILES['fileToUpload']['name']);
		
		for($i = 0; $i < $fileCount; ++$i) {
			// 檢查檔案是否上傳成功
			if($_FILES["fileToUpload"]["error"][$i] === UPLOAD_ERR_OK) {
				/*echo "檔案名稱: " . $_FILES["fileToUpload"]["name"][$i] . "<br/>";
				echo "檔案類型: " . $_FILES["fileToUpload"]["type"][$i] . "<br/>";
				echo "檔案大小: " . ($_FILES["fileToUpload"]["size"][$i] / 1024) . " KB<br/>";
				echo "暫存名稱: " . $_FILES["fileToUpload"]["tmp_name"][$i] . "<br/>";
				echo "編碼檔名: " . $encodeName . "<br/><br/>";*/
				
				// 依RFC 3986進行編碼, 解決中文問題
				$encodeName = rawurlencode($_FILES["fileToUpload"]["name"][$i]);
				$target_dir = "materials/$course/";
				$dest = $target_dir . $encodeName;
				
				// 檢查檔案是否已經存在
				if(file_exists($dest)) {
					echo "<script language=javascript>";
					echo "alert('" . $_FILES["fileToUpload"]["name"][$i] . "已存在！');";
					echo "history.back();";
					echo "</script>";
					exit;
				}
				else {
					// 檔案上傳
					// 會先放在暫存檔中$_FILES["fileToUpload"]["tmp_name"]
					$file = $_FILES["fileToUpload"]["tmp_name"][$i];
					
					// 將檔案移至指定位置
					move_uploaded_file($file, $dest);
					
					// 插入到資料庫
					$sql = "INSERT INTO material(CourseCode, FileName)
					VALUES(" . ourToS($course) . ", " . ourToS($encodeName) . ");";
					mysqli_query($DB_CONNECT, $sql);
				}
			}
			else {
				echo "<script language=javascript>";
				echo "alert('上傳發生錯誤，請選擇課程與上傳檔案！');";
				echo "history.back();";
				echo "</script>";
				exit;
				//echo "錯誤代碼：" . $_FILES["fileToUpload"]["error"][$i] . "<br/>";
			}
		}
	}
	else {
		// 強制返回
		echo "<script language=javascript>";
		echo "history.back();";
		echo "</script>";
		exit;
	}
	
	// 上傳完成
	echo "<script language=javascript>";
	echo "alert('上傳完成');";
	echo "history.back();";
	echo "</script>";
	exit;
?>
