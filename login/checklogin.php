<?php
ob_start();											// 打开缓冲区
session_start();									
include_once 'config.php';							// include_once()函数的作用与include相同，不过它会首先验证是否已经包含了该文件
require 'scripts/class.loginscript.php';

// Define $myusername and $mypassword
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// To protect MySQL injection
$myusername = stripslashes($myusername);			// stripslashes() 函数删除由 addslashes() 函数添加的反斜杠。
													// 提示：该函数可用于清理从数据库中或者从 HTML 表单中取回的数据。
$mypassword = stripslashes($mypassword);

// Connect to server and select databse.
$login = new loginForm;
$response = $login->checkLogin($tbl_name, $myusername, $mypassword);

	if ($response == 'true'){
		echo "true";
		$_SESSION['username'] = $myusername;
		$_SESSION['password'] = $mypassword;
	}
	else {

		echo $response;

	}

ob_end_flush();
?>
