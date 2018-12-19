<?php
	// 下載的 Function
	function downloadFile($file) {
		echo $file;
		// 檢查檔案是否存在
		if(!is_file($file)) { die("<h2>404 File Not Found!</h2>"); }
		
		// 檔案相關資訊
		$len = filesize($file);
		$filename = basename($file);
		$file_extension = strtolower(substr(strrchr($filename, "."), 1));
		// 依RFC 3986進行解碼
		$decodeName = rawurldecode($filename);
		
		// 設定檔案內容類型(Content-Type)
		switch($file_extension) {
			case "pdf": $ctype="application/pdf"; break;
			case "exe": $ctype="application/octet-stream"; break;
			case "zip": $ctype="application/zip"; break;
			case "doc":
			case "docx": $ctype="application/msword"; break;
			case "xls":
			case "xlsx": $ctype="application/vnd.ms-excel"; break;
			case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
			case "gif": $ctype="image/gif"; break;
			case "png": $ctype="image/png"; break;
			case "jpeg":
			case "jpg": $ctype="image/jpg"; break;
			case "mp3": $ctype="audio/mpeg"; break;
			case "wav": $ctype="audio/x-wav"; break;
			case "mpeg":
			case "mpg":
			case "mpe": $ctype="video/mpeg"; break;
			case "mov": $ctype="video/quicktime"; break;
			case "avi": $ctype="video/x-msvideo"; break;
			case "txt": $ctype="text/plain"; break;
			
			// 不可下載的檔案類型(敏感檔案)
			case "php":
			case "htm":
			case "html": die("<b>Cannot be used for ". $file_extension ." files!</b>"); break;
			
			// 強制下載
			default: $ctype="application/force-download";
		}
		
		// 發送http標頭給瀏覽器
		/*header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate");
		header("Cache-Control: public");
		header("Content-Description: File Transfer");*/
		
		// 使用上方switch內決定的Content-Type
		header("Content-Type: $ctype");
		
		// Force the download
		// 指定下載檔名
		header("Content-Disposition: attachment; filename=" . $decodeName);
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: " . $len);
		// 清空輸出緩衝區
		ob_clean();
		// 刷新輸出緩衝
		flush();
		readfile($file);
		exit;
	}
?>
