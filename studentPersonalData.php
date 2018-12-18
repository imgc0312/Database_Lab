<?php //學生資料 個人資料 (可供修改) 
require("connMysql.php");
global $DB_CONNECT;
$sql = 'SELECT * 
FROM student
WHERE id = ' . $_SESSION['user']['id'];
$data=mysqli_query($DB_CONNECT, $sql);//取得所有個人資料
?>

<?php //updata 資料 
$newBirthday=$_POST['Birthday'];
$newEmail=$_POST['Email'];

if(issset($newBirthday)){
	$sql2 = 'UPDATA student
	SET Birthday = ' . $newBirthday . '
	WHERE id = ' . $_SESSION['user']['id'];
	mysqli_query($DB_CONNECT, $sql2);
}

if(issset($newEmail)){
	$sql2 = 'UPDATA student
	SET Email = ' . $newEmail . '
	WHERE id = ' . $_SESSION['user']['id'];
	mysqli_query($DB_CONNECT, $sql2);
}

header("location:studentPersonalData.php");
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>學生資料</title>
</head>

<body>
<?php $rs=mysqli_fetch_assoc($data); ?>
<div class="Data">
  <form method="post" action="" name="form">
    <table width="100%" border="3">
    	<tbody>
            <tr>
              <th width="20%" scope="col">ID</th>
              <th width="80%" scope="col"><?php $rs['ID'] ?></th>
            </tr>
            <tr>
              <th scope="row">Name</th>
              <td><?php echo $rs['StuName'] ?></td>
            </tr>
            <tr>
              <th scope="row">Gender</th>
              <td><?php echo $rs['Gender'] ?></td>
            </tr>
            <tr>
              <th scope="row">Birthday</th>
              <td><input name="Birthday" id="Birthday" maxlength="80" type="date" <?php echo 'value = ' . $rs['Birthday'] ?>/>
              </td>
            </tr>
            <tr>
              <th scope="row">Email</th>
              <td><input name="Email" id="Email" maxlength="80" type="email" <?php echo 'value = ' . $rs['Email'] ?>/></td>
            </tr>
            <tr>
              <th scope="row">Department</th>
              <td><?php echo $rs['Dept'] ?></td>
            </tr>
            <tr>
              <th scope="row">入學年</th>
              <td><?php echo $rs['InYear'] ?></td>
            </tr>
        </tbody>
        </table>
      <input type="submit" value="確定修改">
    </form>
  
</div>
</body>
</html>