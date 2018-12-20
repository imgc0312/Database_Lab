<?php 
require_once("libs/connMysql.php");
global $DB_CONNECT;
$data=mysqli_query($DB_CONNECT, 'select Code, Type, NameCh, NameEn from course order by Code');//取得所有課程資料
$RANK = 0;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Course Infomation</title>
</head>

<body>
<?php
	switch($RANK){//按權限輸出頁面
		case 1://admin
?>
	
<?php
		case 0://normal
?>
	<?php //以迴圈輸出data
    for($i=1;$i<=mysqli_num_rows($data);$i++){
     $rs=mysqli_fetch_assoc($data);
    ?>
    <div class="container">
      <div class="CourseViewGenerator">
          <table width="100%" align="center">
                <tr id="ID_Code">
                  <td colspan="2"><?php echo $rs['Code']?></td>
                </tr id="ID_Type">
                <tr>
                  <td width="25%">Type</td>
                  <td width="75%"><?php echo $rs['Type']?></td>
                </tr>
                <tr id="ID_NameCh">
                  <td>NameCH</td>
                  <td><?php echo $rs['NameCh']?></td>
                </tr>
                <tr>
                  <td>NameEn</td>
                  <td><?php echo $rs['NameEn']?></td>
                </tr>
            </table>
     </div>
    </div>
    <br />
    <?php } //迴圈結尾 ?>
<?php } //switch結尾 ?>
</body>

</html>
