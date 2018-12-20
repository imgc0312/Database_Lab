<?php //教師 個人 課程頁面(可編輯)
require_once("libs/connMysql.php");
require_once("libs/ourLib.php");
global $DB_CONNECT;
session_start();
switch($_SESSION['user']['privilege']){
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

if(( isset($_POST['Code']) && isset($_POST['content']) && isset($_POST['act']) ) == false){//無資料
	echo "
		<script>
			alert('isset problem');
			history.back();
		</script>";
}
$Code = $_POST['Code'];
$content = $_POST['content'];
$act = $_POST['act'];

$sql = "UPDATE course,teacher
	SET course.".$act." = ". ourToS($content) . "
	WHERE teacher.ID = " . ourToS($_SESSION['user']['id']) . " AND
	course.Instructor = teacher.TchName AND course.Code = " . ourToS($Code);
$data=mysqli_query($DB_CONNECT, $sql);//取得課程資料
	echo "
		<script>
			alert('update success.');
			history.back();
		</script>";
?>