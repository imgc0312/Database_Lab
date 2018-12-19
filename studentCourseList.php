<?php //學生 個人修課 清單
require("connMysql.php");
require("ourLib.php");
global $DB_CONNECT;
session_start();
$sql = 'SELECT course.Code, course.Type, course.NameCh, course.NameEn
FROM course, coursesel
WHERE course.Code = coursesel.Code AND coursesel.StuID = ' . ourToS($_SESSION['user']['id']) . '
ORDER BY Code';
$data=mysqli_query($DB_CONNECT, $sql);//取得所有修課資料
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Course List</title>
</head>

<body>

<?php //以迴圈輸出data
    for($i=1;$i<=mysqli_num_rows($data);$i++){
     $rs=mysqli_fetch_assoc($data);
?>
	<div class="CourseViewGenerator">
        <form method="get" action="studentCourseInfo.php">
        	<input type="hidden" name="act" value="information" />
        	<table align="center" width="100%" border="3">
            	<tr>
                	<td width="20%"><input type="text" name="Code" readonly value="<?php echo $rs['Code']?>" /></td>
                    <td width="10%"><input type="text" readonly value="<?php echo $rs['Type']?>" /></td>
                    <td width="30%"><input type="text" readonly value="<?php echo $rs['NameCh']?>" /></td>
                    <td width="30%"><input type="text" readonly value="<?php echo $rs['NameEn']?>" /></td>
                    <td width="10%"><input type="submit" value="enter" /></td>
                </tr>
            </table>
        </form>
    </div>
	<br />
<?php } //迴圈結尾 ?>

</body>
</html>