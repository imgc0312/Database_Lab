<?php //教師 個人授課 清單
require_once("libs/connMysql.php");
require_once("libs/ourLib.php");
global $DB_CONNECT;
session_start();
$sql = "SELECT course.*
	FROM course, teacher
	WHERE teacher.ID = " . ourToS($_SESSION['user']['id']) . " AND
	course.Instructor = teacher.TchName
	ORDER BY course.Code";
$data=mysqli_query($DB_CONNECT, $sql);//取得所有授課資料
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Teach Course List</title>
</head>

<body>
	<button onclick="location.href='home.php'">回首頁</button>
	<table align="center" width="100%" border="3">
<?php //以迴圈輸出data
	  for($i=1;$i<=mysqli_num_rows($data);$i++){
	  	$rs=mysqli_fetch_assoc($data);
?>
      <div class="CourseViewGenerator">
          <form method="get" action="teacherCourseInfo.php">
              <input type="hidden" name="act" value="information" />
                  <tr>
                      <td width="20%"><input style="width:100%" type="text" name="Code" readonly value="<?php echo $rs['Code']?>" /></td>
                      <td width="10%"><input style="width:100%" type="text" readonly value="<?php echo $rs['Type']?>" /></td>
                      <td width="30%"><input style="width:100%" type="text" readonly value="<?php echo $rs['NameCh']?>" /></td>
                      <td width="30%"><input style="width:100%" type="text" readonly value="<?php echo $rs['NameEn']?>" /></td>
                      <td width="10%"><input style="width:100%" type="submit" value="enter" /></td>
                  </tr>
          </form>
      </div>
      <br />
<?php } //迴圈結尾 ?>
	</table>

</body>
</html>