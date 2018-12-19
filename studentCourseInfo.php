<?php //學生 個人 課程頁面
require("libs/connMysql.php");
require("libs/ourLib.php");
global $DB_CONNECT;
session_start();
$Code = $_GET['Code'];
if(isset($_GET['act']))
	$act = $_GET['act'];
else
	$act = "information";
$sql = 'SELECT course.*
FROM course, coursesel
WHERE course.Code = coursesel.Code AND coursesel.StuID = ' . ourToS($_SESSION['user']['id']) . ' AND course.Code = ' . ourToS($Code);
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
                	<td ><input type="submit" name="act" value="information" /></td>
                    <td ><input type="submit" name="act" value="homework" /></td>
                    <td ><input type="submit" name="act" value="grade" /></td>
                    <td ><input type="submit" name="act" value="comment" /></td>
                </tr>
            </table>
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
            
            <table  align="center" width="100%" border="3">
            <?php //依act 決定輸出
				switch($act){//act 決定項
					case "information"://資訊
			 ?>
                <tr><td width="100%" align="center">大綱</td></tr>
                <tr><td width="100%" align="center"><pre><?php echo $rs['Syllabus']?> </pre></td></tr>
                <tr><td width="100%" align="center">成績計算方式</td></tr>
                <tr><td width="100%" align="center"><pre><?php echo $rs['Evaluation']?> </pre></td></tr>
            	<?php
					break;
					case 'homework'://作業
						echo '<tr>
								<td width="16.7%">hw name</td>
								<td width="16.7%">開始時間</td>
								<td width="16.7%">結束時間</td>
								<td width="16.7%">上傳時間</td>
								<td width="16.7%">分數</td>
								<td width="16.7%">上傳</td>
							</tr>';
						$sql = 'SELECT *
								FROM hw
								WHERE CourseCode = ' . ourToS($Code);
						$data2 = mysqli_query($DB_CONNECT, $sql);
						for($i=1;$i<=mysqli_num_rows($data2);$i++){
							$rs2=mysqli_fetch_assoc($data2);
							$sql = 'SELECT *
								FROM hwsubmit
								WHERE CourseCode = ' . ourToS($Code) . ' AND HwName = ' . ourToS($rs2['HwName']);
							$data3 = mysqli_query($DB_CONNECT, $sql);
							echo '<tr>
								<td>'.$rs2['HwName'].'</td>
								<td>'.$rs2['StartTime'].'</td>
								<td>'.$rs2['EndTime'].'</td>';
							if($data3){//有submit
								$rs3=mysqli_fetch_assoc($data3);
								echo '
								<td>'.$rs3['Time'].'</td>
								<td>'.$rs3['Score'].'</td>';
							}
							else{//無submit
								echo '
								<td>未交</td>
								<td>0</td>';
							}
							echo '<td><button type="button" value="upload" onClick="alert(\'上傳功能未完成\')" /></td>';
							echo '</tr>';
							
						}
						
			?>
            	<?php
					break;
					case 'grade'://成績
						//印你的成績
						$sql = 'SELECT Score
								FROM coursesel
								WHERE Code = ' . ourToS($Code) . ' AND StuID = ' . ourToS($_SESSION['user']['id']);
						$data2 = mysqli_query($DB_CONNECT, $sql);
						$rs2=mysqli_fetch_assoc($data2);
							echo '<tr>';
							echo '<td width="25%"> 你的成績 </td>';
							echo '<td>' . $rs2['Score'] .'</td>';
							echo '</tr>';
						//印全班成績
						$sql = 'SELECT *
								FROM coursesel
								WHERE Code = ' . ourToS($Code) . '
								ORDER BY Code';
						$data2 = mysqli_query($DB_CONNECT, $sql);
						echo '<tr><td colspan="2">全班成績</td></tr>';
						for($i=1;$i<=mysqli_num_rows($data2);$i++){
							$rs2=mysqli_fetch_assoc($data2);
							echo '<tr>';
							echo '<td width="25%">' . $rs2['StuID'] .'</td>';
							echo '<td>' . $rs2['Score'] .'</td>';
							echo '</tr>';
						}
			?>
                <?php
					break;
					case 'comment'://留言板
						echo '<tr>
								<td width="10%">post ID</td>
								<td width="10%">發文者</td>
								<td width="80%">內文</td>
							</tr>';
						$sql = 'SELECT *
								FROM message
								WHERE Code = ' . ourToS($Code) . '
								ORDER BY ID DESC';
						$data2 = mysqli_query($DB_CONNECT, $sql);
						for($i=1;$i<=mysqli_num_rows($data2);$i++){
							$rs2=mysqli_fetch_assoc($data2);
							echo '<tr>
								<td width="10%">' . $rs2['ID'] . '</td>
								<td width="10%">' . $rs2['UserId'] . '</td>
								<td width="80%"><pre>' . $rs2['Content'] . '</pre></td>
							</tr>';
						}
					
			?>
            	<tr><td colspan="3">
                    <button type="button" onClick="addCommentForm.submit()">add comment</button>
                    </td></tr>
			<?php }//act決定項結尾 ?>
            </table>
        </form>
        
        <form id="addCommentForm" method="post" action="comment.php"><!-- 用於add comment jump-->
        	<input type="hidden" name="Code" value="<?php echo $Code ?>" />
        </form>
    </div>
<?php
	}
	else{//無data
		echo '<p>not find course page</p>';
	}
?>
</body>
</html>