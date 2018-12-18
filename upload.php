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
			echo "暫存名稱: " . $_FILES["fileToUpload"]["tmp_name"][$i] . "<br/>";

			// 檢查檔案是否已經存在
			if(file_exists("upload/" . $_FILES["fileToUpload"]["name"][$i])) {
				echo "檔案已存在。<br/>";
			}
			else {
				// 檔案上傳後
				// 會先放在暫存檔中$_FILES["fileToUpload"]["tmp_name"]
				$file = $_FILES["fileToUpload"]["tmp_name"][$i];
				$dest = $target_dir . $_FILES["fileToUpload"]["name"][$i];

				// 將檔案移至指定位置
				// utf-8編碼網頁無法在big5系統正確處理中文檔名,
				// 因為move_uploaded_file()不能處理utf-8中文編碼, 需利用iconv()函數作轉碼
				move_uploaded_file($file, iconv("utf-8", "big5", $dest));
			}
		}
		else {
			echo "錯誤代碼：" . $_FILES["fileToUpload"]["error"][$i] . "<br/>";
		}
	}
?>
