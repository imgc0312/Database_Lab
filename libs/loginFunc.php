<?php
	require "connMysql.php";

	/*
     * Password hash function
	 * 可用於新增帳戶, 將密碼加密後儲存到資料庫
     * @pass	:	User password
     *
     * @return	:	Hashed password
     */
    function hashPass($pass) {
        // password_hash()	-	Creates a password hash
        // PASSWORD_DEFAULT	:	Use the bcrypt algorithm
        return password_hash($pass, PASSWORD_DEFAULT);
    }
    
    /*
     * Login function
     * @id			:	User ID
     * @password	:	User password
     *
     * @return		:	login success
     */
    function login($id, $password) {
		global $DB_CONNECT;
		$sql = "SELECT password, userName, privilege FROM user WHERE userId = '$id'";
		$result = mysqli_query($DB_CONNECT, $sql);
		$row = mysqli_fetch_assoc($result);
		
		// Verifies that a password matches a hash
		if(password_verify($password, $row['password'])) {
			session_regenerate_id();
			$_SESSION['user']['id'] = $id;
			$_SESSION['user']['name'] = $row['userName'];
			$_SESSION['user']['privilege'] = $row['privilege'];
			return true;
		}
		else {
			return false;
		}
	}
?>