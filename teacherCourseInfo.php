<?php //教師 個人 課程頁面(可編輯)
require_once("libs/connMysql.php");
require_once("libs/ourLib.php");
global $DB_CONNECT;
if(!session_id()){//判斷session是否開啟
	session_start();
}
switch($_SESSION['user']['privilege']){//權限檢查
	case 'admin':
	case 'teacher':
		break;
	case 'student':
	default:
		echo "
		<script>
			alert('you do not have privilege to use this page.');
			history.back();
		</script>";
}

$Code = $_GET['Code'];
if(isset($_GET['act']))
	$act = $_GET['act'];
else
	$act = "information";
$sql = "SELECT course.*
	FROM course, teacher
	WHERE teacher.ID = " . ourToS($_SESSION['user']['id']) . " AND
	course.Instructor = teacher.TchName AND
	course.Code = " . ourToS($Code) . "
	ORDER BY course.Code";
$data=mysqli_query($DB_CONNECT, $sql);//取得課程資料
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>課程資訊</title>
</head>

<body>
<?php
	if($data){//有data
		$rs=mysqli_fetch_assoc($data);
?>
	<div class="CourseViewGenerator">
        <form id="pageForm" method="get" action="">
        	<input type="hidden" name="Code" value="<?php echo $Code ?>"/>
        	<table align="center" width="100%" border="3"><!-- 功能選單 -->
            	<tr>
                	<td ><button style="width:100%" type="button" onClick="location.href = 'teacherCourseList.php';" >回列表</button></td>
                	<td ><input style="width:100%" type="submit" name="act" value="information" /></td>
                    <td ><input style="width:100%" type="submit" name="act" value="material" /></td>
                    <td ><input style="width:100%" type="submit" name="act" value="homework" /></td>
                    <td ><input style="width:100%" type="submit" name="act" value="grade" /></td>
                    <td ><input style="width:100%" type="submit" name="act" value="comment" /></td>
                </tr>
            </table>
       </form>
      <table align="center"  width="100%" border="3"><!-- 顯示資料 -->
          <tr>
              <td width="50%"><?php echo $rs['Code']?></td>
              <td width="50%"><?php echo $rs['Type']?></td>
          </tr>
          <tr>
              <td width="100%" colspan="2"><?php echo $rs['NameCh']?></td>
          </tr>
          <tr>
              <td width="100%" colspan="2"><?php echo $rs['NameEn']?></td>
          </tr>
      </table>
      
      
      <?php //依act 決定輸出
          switch($act){//act 決定項
              case "information"://資訊
       ?>
       <table  align="center" width="100%" border="3">
       	<form method="post" action="courseInfoUpdate.php"><!-- 修改大綱 -->
        	<input type="hidden" name="Code" value="<?php echo $rs['Code']?>"/>
            <input type="hidden" name="act" value="Syllabus"/>
          <tr>
          	<td width="95%" align="center">大綱</td>
            <td width="5%" align="center"><button style="width:100%">修改</button></td>
          </tr>
          <tr><td colspan="2" align="center"><textarea style="width:100%;text-align:center" name="content" rows="5"><?php echo $rs['Syllabus']?></textarea></td></tr>
        </form>
        <form method="post" action="courseInfoUpdate.php"><!-- 成績計算方式 -->
        	<input type="hidden" name="Code" value="<?php echo $rs['Code']?>"/>
            <input type="hidden" name="act" value="Evaluation"/>
          <tr>
          	<td align="center">成績計算方式</td>
            <td align="center"><button style="width:100%">修改</button></td>
          </tr>
          <tr><td colspan="2" align="center"><textarea style="width:100%;text-align:center" name="content" rows="5"><?php echo $rs['Evaluation']?></textarea></td></tr>
         </form>
       </table>  
          <?php
              	break;
              case 'material'://教材
		?>
        	<table  align="center" width="100%" border="3">
            	<tr>
                  	<td >upload new File</td>
                </tr>
                <tr>
                  	<td >
						<?php $_GET['course']=$Code;
						include_once("materialUpload.php"); ?>
					</td>
                </tr>
                <tr>
                  	<td >File List</td>
                </tr>
			<?php
				$sql = 'SELECT *
						FROM material
						WHERE CourseCode = ' . ourToS($Code) . '
						ORDER BY ID DESC';
				$data2 = mysqli_query($DB_CONNECT, $sql);
				for($i=1;$i<=mysqli_num_rows($data2);$i++){//迴圈印出教材
					$rs2=mysqli_fetch_assoc($data2);
			?>
                <tr>
                    <td><a href='materialDownload.php?course=<?php echo $rs2["CourseCode"] ?>&filename=<?php echo $rs2["FileName"] ?>'><?php echo  rawurldecode($rs2['FileName']) ?></a></td>
                </tr>
       		<?php }//迴圈印出教材 結尾 ?>
          	</table>
            
          <?php
              	break;
              case 'homework'://作業 發布及修改
		?>
        	<?php include_once("teacherHW.php"); ?>
          <?php
              	break;
              case 'grade'://成績
                  //改學生成績
			?>
            <div>
				<?php 
                    $_GET['course']=$Code;
                    include_once("eval.php");
                ?>
            </div>
          <?php
              	break;
              case 'comment'://留言板
			?>
            	<table  align="center" width="100%" border="3">
                  <tr>
                  	<td colspan="3">
                    	<button type="button" onClick="addCommentForm.submit()">add comment</button>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%">post ID</td>
                    <td width="15%">發文者</td>
                    <td width="70%">內文</td>
                  </tr>
            <?php
                  $sql = 'SELECT *
                          FROM message
                          WHERE Code = ' . ourToS($Code) . '
                          ORDER BY ID DESC';
                  $data2 = mysqli_query($DB_CONNECT, $sql);
                  for($i=1;$i<=mysqli_num_rows($data2);$i++){//迴圈印出comment
                      $rs2=mysqli_fetch_assoc($data2);
			?>
            
                      <tr>
                          <td ><?php echo $rs2['ID'] ?></td>
                          <td ><?php echo $rs2['UserId'] ?></td>
                          <td ><pre><?php echo $rs2['Content'] ?></pre></td>
                      </tr>
            <?php }	//迴圈印出comment 結尾?>
              	</table>
      <?php }//act決定項結尾 ?>
    </div>
<?php
	}
	else{//無data
?>
		<p>not find course page</p>
<?php } //無data結尾 ?>

<!-- 隱藏表單 -->
<form style="display:none" id="addCommentForm" method="post" action="comment.php"><!-- 用於add comment-->
	<input type="hidden" name="oURL" value="teacherCourseInfo.php" />
	<input type="text" name="Code" value="<?php echo $Code ?>" />
</form>
</body>
</html>