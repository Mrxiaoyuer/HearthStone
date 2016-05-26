<?php
  if (!session_id()) session_start();
  ob_start();

  include_once './login/config.php';
  $con = new mysqli($host, $username, $password, $db_name);
  $now_username = $_SESSION['username'];
  $sql = "select * from users where username='$now_username'";
  $ans = $con->query($sql);
  $nowuser = $ans->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>HearthStone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
  </head>
  <body>

    <nav class="navbar navbar-default" role="navigation">
           <div class="navbar-header col-md-2">
              <a class="navbar-brand" href="./index.php">HearthStone</a>
           </div>

           <div class = "col-md-10 row">
              <ul class="nav navbar-nav col-md-11">
                 <?php
                    if ($nowuser["usertype"] == 0){
                    echo '<li><a href="./Patient_list.php">Patient Info</a></li>
                      <li><a href="./Doctor.php">Doctor Info</a></li>
                      <li><a href="./WorkerTodolist.php">Worker ToDo</a></li>
                      <li><a href="./All_Devices.php">Devices Info</a></li>
                      <li><a href="./map_user.php">Map User</a></li>';
                    }
                    elseif ($nowuser["usertype"] == 1){
                      echo '<li><a href="./manager/AssignList.php">AssignList</a></li>';
                      echo '<li><a href="./manager/RecycleList.php">RecycleList</a></li>';
                      echo '<li><a href="./manager/ManageRoom.php">ManageRoom</a></li>';
                    }
                    elseif ($nowuser["usertype"] == 2){
                      echo '<li><a href="./Doctor.php?id='.$nowuser["usertypeID"] .'">Doctor Info</a></li>';
                    }
                    elseif ($nowuser["usertype"] == 3){
                      echo '<li><a href="./Patient.php?id='.$nowuser["usertypeID"] .'">Patient Info</a></li>';
                    }
                    elseif ($nowuser["usertype"] == 4){
                      echo '<li><a href="./WorkerTodolist.php">Worker Info</a></li>';
                      echo '<li><a href="./All_Devices.php">Devices list</a></li>';
                    }
                    else{
                      echo '<li>Error Code</li>';
                    }
                 ?>


              </ul>
              <ul class="nav navbar-nav col-md-1">
                <li><a href = "./profile.php">Profile</a></li>
              </ul>
           </div>
    </nav>
