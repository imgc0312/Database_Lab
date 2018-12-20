<?php
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require_once("/PHPMailer/src/Exception.php");
	require_once("/PHPMailer/src/PHPMailer.php");
	require_once("/PHPMailer/src/SMTP.php");
	require_once("config/config.php");
	
	if($_POST["to"] == "" || $_POST["subject"] == "" || $_POST["message"] == "") {
		echo "<script language=javascript>";
		echo "alert('請勿空白！');";
		echo "history.back();";
		echo "</script>";
		exit;
	}
	
	$to = $_POST["to"];
	$subject = $_POST["subject"];
	$message = $_POST["message"];
	// 以","拆出各個收件者的信箱
	$to = explode(",", $to);
	// 收件者數量
	$toNums = count($to);
	// 若一行超過70字
	// 使用\r\n換行
	$message = wordwrap($message, 70, "\r\n");
	
	$mail = new PHPMailer(true);// 建立PHPMailer物件
	try {
		// Server settings
		//$mail->SMTPDebug = 2;                               // Enable verbose debug output
		$mail->SMTPDebug = 0;                                 // Disable debugging
		$mail->isSMTP();                                      // 使用SMTP
		$mail->Host = 'smtp.gmail.com';						  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // 設定SMTP需要驗證
		$mail->Username = MAIL_USERNAME;					  // SMTP username
		$mail->Password = MAIL_PASS;						  // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // Gmail port 587 for TLS, port 465 for SSL
		$mail->CharSet = 'UTF-8';							  // 設定字符集(解決中文)
		$mail->Encoding = 'base64';							  // 編碼方式
		
		$mail->setFrom(MAIL_USERNAME, '數位學習系統');		  // 寄件者信箱與姓名
		for($i = 0; $i < $toNums; ++$i) {
			// 收件者信箱與名稱
			$mail->addAddress($to[$i]);
		}
		//$mail->addAddress('info@example.com', 'info');
		//$mail->addAddress('info@example.com');
		//$mail->addReplyTo('info@example.com', 'Information');
		$mail->addBCC(MAIL_USERNAME);						  // 密件副本

		// 附件
		//$encodeName = 'path/to/file' . rawurlencode('filename');
		//$mail->addAttachment($encodeName);
		//$mail->addAttachment($encodeName, 'newName.jpg');	  // 以新的檔名寄出

		// Content
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = $subject;							  // 郵件標題
		$mail->Body    = $message;							  // 郵件內容
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();										  // 發送郵件
		//echo 'Message has been sent';
		echo "<script language=javascript>";
		echo "alert('發送成功！');";
		echo "history.back();";
		echo "</script>";
		exit;
	}
	catch(Exception $e) {
		//echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		//echo '[Error] Message could not be sent.';
		echo "<script language=javascript>";
		echo "alert('發生錯誤！');";
		echo "history.back();";
		echo "</script>";
		exit;
	}
?>
