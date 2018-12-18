<?php
	$target_dir = "uploads/";
	
	// 取得上傳檔案數量
	$fileCount = count($_FILES['fileToUpload']['name']);
	if($fileCount == 0) {
		echo "No File";
	}

	for($i = 0; $i < $fileCount; ++$i) {
		// 檢查檔案是否上傳成功
		if($_FILES["fileToUpload"]["error"][$i] === UPLOAD_ERR_OK) {
			echo "檔案名稱: " . $_FILES["fileToUpload"]["name"][$i] . "<br/>";
			echo "檔案類型: " . $_FILES["fileToUpload"]["type"][$i] . "<br/>";
			echo "檔案大小: " . ($_FILES["fileToUpload"]["size"][$i] / 1024) . " KB<br/>";
			echo "暫存名稱: " . $_FILES["fileToUpload"]["tmp_name"][$i] . "<br/><br/>";

			// 檢查檔案是否已經存在
			if(file_exists("upload/" . $_FILES["fileToUpload"]["name"][$i])) {
				echo "檔案已存在。<br/>";
			}
			else {
				// 檔案上傳後
				// 會先放在暫存檔中$_FILES["fileToUpload"]["tmp_name"]
				$file = $_FILES["fileToUpload"]["tmp_name"][$i];
				// 依RFC 3986進行編碼, 解決中文問題
				$encodeName = rawurlencode($_FILES["fileToUpload"]["name"][$i]);
				$dest = $target_dir . $encodeName;

				// 將檔案移至指定位置
				move_uploaded_file($file, $dest);
			}
		}
		else {
			echo "錯誤代碼：" . $_FILES["fileToUpload"]["error"][$i] . "<br/>";
		}
	}
?>
