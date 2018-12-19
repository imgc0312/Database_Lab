<?php //學生 個人 課程頁面
require("connMysql.php");
require("ourLib.php");
global $DB_CONNECT;
session_start();
$Code = $_GET['Code'];
$act = $_GET['act'];
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
        <form method="get" action="">
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
                	<td ><input name="Code" readonly><?php echo $rs['Code']?></input></td>
                    <td ><input readonly><?php echo $rs['Type']?></input></td>
                </tr>
                <tr>
                    <td colspan="2"><input readonly><?php echo $rs['NameCh']?></input></td>
                </tr>
                <tr>
                    <td colspan="2"><input readonly><?php echo $rs['NameEn']?></input></td>
                </tr>
                
            <?php //依act 決定輸出
				switch($act){//act 決定項
					case "information"://資訊
			 ?>
                <tr><td colspan="2" align="center">大綱</td></tr>
                <tr><td colspan="2" align="center"><pre><?php echo $rs['Syllabus']?> </pre></td></tr>
                <tr><td colspan="2" align="center">成績計算方式</td></tr>
                <tr><td colspan="2" align="center"><pre><?php echo $rs['Evaluation']?> </pre></td></tr>
            	<?php
					break;
					case 'homework'://作業
						
			?>
             	<tr><td colspan="2">hw 待完成</td></tr>
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
							echo '<td> 你的成績 </td>';
							echo '<td>' . $rs2['Score'] .'</td>';
							echo '</tr>';
						//印全班成績
						$sql = 'SELECT *
								FROM coursesel
								WHERE Code = ' . ourToS($Code);
						$data2 = mysqli_query($DB_CONNECT, $sql);
						echo '<tr><td colspan="2">全班成績</td></tr>';
						for($i=1;$i<=mysqli_num_rows($data2);$i++){
							$rs2=mysqli_fetch_assoc($data2);
							echo '<tr>';
							echo '<td>' . $rs2['StuID'] .'</td>';
							echo '<td>' . $rs2['Score'] .'</td>';
							echo '</tr>';
						}
			?>
                <?php
					break;
					case 'comment'://留言板
			?>
            	<tr><td colspan="2">comment 待完成</td></tr>
            <?php }//act決定項結尾 ?>
            </table>
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