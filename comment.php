<!-- add comment -->
<?php //學生 個人 課程頁面
require_once("libs/connMysql.php");
require_once("libs/ourLib.php");
global $DB_CONNECT;
session_start();
$Code = $_POST['Code'];
$oURL = $_POST['oURL'];
$UID = $_SESSION['user']['id'];
@$Content = $_POST['Content'];
if(isset($Content)){//有輸入	
	$sql = 'INSERT INTO message (Code, UserId, Content)
	VALUES ( ' . ourToS($Code) . ',' . ourToS($UID) . ',' . ourToS($Content) . ' )';
	mysqli_query($DB_CONNECT, $sql);
	$tURL = $oURL.'?act=comment&Code=' . $Code;
	header("location:$tURL");
}
else{//無輸入
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>add comment</title>
</head>

<body>
	<form method="post" action="comment.php">
		<input type="hidden" name="oURL" value="<?php echo $oURL; ?>" />
    	<table width="100%" align="center" border="3">
        	<tr>
            	<td width="20%">course</td>
            	<td width="80%"><input type="text" name="Code" readonly value="<?php echo $Code ?>" /></td>
            </tr>
    		<tr>
            	<td>poster</td>
            	<td><input type="text" name="UserId" readonly value="<?php echo $_SESSION['user']['id']; ?>"/></td>
            </tr>
            <tr height="50%">
            	<td>content</td>
            	<td><textarea name="Content" rows="5"></textarea></td>
            </tr>
         </table>
         <table
    		<tr>
            	<td width="50%" align="center"><button type="button" onClick="history.back()">back</button></td>
            	<td width="50%" align="center"><input type="submit" value="submit" /></td>
            </tr>
        </table>
    </form>

</body>
</html>
<?php } ?>