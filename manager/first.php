<?php
/**
 * Created by PhpStorm.
 * User: Walter
 * Date: 2016/5/21
 * Time: 20:41
 */

echo "this dddddis my firstWalter script" . "<br>" . "Walter";
//$con = mysql_connect("localhost", "root", "shaoshuai");
$con = new mysqli("localhost", "root", "shaoshuai", "hearthstone");
if ($con->connect_error)
{
    die('Could not connect: ' . mysqli_connect_error());
}
else{
    echo "<br>" . "Successful Connection";
}
$ans = $con->query("select * from mytable");
$now = $ans->fetch_assoc();
echo "<br>". $now["Name"];


//
//if ($con->query("Create database Walter") === TRUE) {
//    echo "Database created successfully";
//} else {
//    echo "Error creating database: " . $con->error;
//}



$con->close();
