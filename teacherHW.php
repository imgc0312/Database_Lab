<?php //教師 個人 課程頁面用 作業發布相關
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
$sql = "SELECT hw.*
	FROM hw, course, teacher
	WHERE teacher.ID = " . ourToS($_SESSION['user']['id']) . " AND
	course.Instructor = teacher.TchName AND hw.CourseCode = course.Code AND course.Code = " . $Code;
$data=mysqli_query($DB_CONNECT, $sql);//取得hw資料

//添加新作業
if(isset($_POST['Decide'])){
	if($_POST['Decide'] == "1"){//有新資料送出
		$HwName = $_POST['HwName'];
		$StartTime = $_POST['StartTime'];
		$EndTime = $_POST['EndTime'];
		if($StartTime ==""){//當輸入為空 給予預設時間
			$StartTime = date_format(date_create('2000-01-01'),'Y-m-d H:i:s');
		}
		if($EndTime ==""){//當輸入為空 給予預設時間
			$EndTime = date_format(date_create('2020-12-31'),'Y-m-d H:i:s');
		}
		
		
		$sql = "SELECT COUNT(*) as haveExist
			FROM hw
			WHERE hw.CourseCode = ".ourToS($Code)."
				AND hw.HwName = ".ourToS($HwName);
		$rs = mysqli_fetch_assoc(mysqli_query($DB_CONNECT, $sql));
		if($rs['haveExist'] != 0){
			echo errorHtml("HwName 不可以重複");
		}
		else if($HwName == ""){
			echo errorHtml("HwName 不可為空");
		}
		else if(!strtotime($StartTime)){
			echo ourToS($StartTime)."<br/>";
			echo errorHtml("StartTime 格式錯誤");
		}
		else if(!strtotime($EndTime)){
			echo ourToS($EndTime)."<br/>";
			echo errorHtml("EndTime 格式錯誤");
		}
		else{
			$sql = "INSERT INTO hw(CourseCode, HwName, StartTime, EndTime)
				VALUES (".ourToS($Code).",".ourToS($HwName).",".ourToS($StartTime).",".ourToS($EndTime).")";
			mysqli_query($DB_CONNECT, $sql);
			$_POST['Decide']="0";
		}
	}
}
?>

<table  align="center" width="100%" border="3">
    <tr><!-- title -->
        <td width="40%">HwName</td>
        <td width="20%">StartTime</td>
        <td width="20%">EndTime</td>
        <td width="20%">&nbsp;</td>
    </tr>
    <tr>
    	<form method="post" action="">
        <input type="hidden" id="Decide" name="Decide"/>
        <td width="40%"><input style="width:100%" type="text" name="HwName" maxlength="255"/></td>
        <td width="20%"><input style="width:100%" type="date" name="StartTime"/></td>
        <td width="20%"><input style="width:100%" type="date" name="EndTime"/></td>
        <td width="20%"><button style="width:100%" type="submit" onClick="Decide.value='1'">發布新作業</button></td>
        </form>
    </tr>
    <tr>
    	<td colspan="4" align="center">List</td>
    </tr>
<?php
    $sql = 'SELECT *
            FROM hw
            WHERE CourseCode = ' . ourToS($Code);
    $data2 = mysqli_query($DB_CONNECT, $sql);
    for($i=1;$i<=mysqli_num_rows($data2);$i++){//迴圈印出comment
    	$rs2=mysqli_fetch_assoc($data2);
?>
            
	<tr>
		<td ><?php echo $rs2['HwName'] ?></td>
        <td ><?php echo $rs2['StartTime'] ?></td>
        <td ><?php echo $rs2['EndTime'] ?></td>
    </tr>
<?php }	//迴圈印出comment 結尾?>
</table>

<?php
function errorHtml($message){
	return "<b><font color='red'>".$message."</font></b><br/>";
}
?>

