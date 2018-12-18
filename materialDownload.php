<?php
	require("downloadFunc.php");
	
	// 檢查檔名變數已設置且不為NULL
	if(isset($_GET["filename"])) {
		$file = $_GET["filename"];  // 下載檔名
		// 依RFC 3986進行編碼(server中的檔名已編碼)
		$encodeName = rawurlencode($file);
		$fileToDownload = "uploads/" . $encodeName;
		downloadFile($fileToDownload);
	}
?>
