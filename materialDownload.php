<?php
	require_once("libs/downloadFunc.php");
	
	// 檢查變數已設置且不為NULL
	if(isset($_GET["course"]) && isset($_GET["filename"])) {
		$course = $_GET["course"];
		$file = $_GET["filename"];  // 下載檔名
		// 依RFC 3986進行編碼(server中的檔名已編碼)
		$encodeName = rawurlencode($file);
		$fileToDownload = "materials/$course/" . $encodeName;
		echo $fileToDownload;
		downloadFile($fileToDownload);
	}
?>
