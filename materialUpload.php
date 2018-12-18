<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>教材上傳</title>
	</head>
	<body>
		<!--表單包含檔案上傳, enctype設為"multipart/form-data"-->
		<form method="post" enctype="multipart/form-data" action="upload.php">
			檔案上傳：
			<!--讓網頁可以一次上傳多個檔案, 在<input>中加上multiple屬性, 並將檔案名稱加上[]-->
			<input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
			<input type="submit" value="上傳" name="upload">
		</form>
	</body>
</html>
