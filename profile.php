<?php 
	session_start();
	require('./header.php');        // 导航栏

	$con = new mysqli("localhost", "root", "shaoshuai", "hearthstone");
    $username = $_SESSION['username'];
    $sql = "select * from users where username='$username'";
    $ans = $con->query($sql);

   	while ($ans and $now = $ans->fetch_object()){
        echo "UserName: " . $now->username . "<br>";
        echo "Email: " . $now->email . "<br>";
        echo "UserType: " . $now->usertype . "<br>";
        echo "TimeStart: " . $now->mod_timestamp . "<br>";

    }





  require('./footer.php');        // 导航栏
?> 
