<?php
	session_start();
	session_unset();
	session_destroy();
	// 重新導向到登入畫面
	header("Location: index.php");
?>
