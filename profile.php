<?php 
	session_start();
	require('./header.php');        // 导航栏
  include_once './login/config.php';
	$con = new mysqli($host, $username, $password, $db_name);
    // $username = $_SESSION['username'];
    // $sql = "select * from users where username='$username'";
    // $ans = $con->query($sql);

?>
    <h1 class = "text-center"> User Information </h1>
    <div class = "row">
    <div class="col-md-offset-2 col-md-8">
        <table class="table">

            <thead>
            <tr>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>UserType</th>
                        <th>CreateTime</th>
            </tr>
            </thead>
        <tbody>
        <?php
            $now_username = $_SESSION['username'];
            $sql = "select * from users where username='$now_username'";
            $ans = $con->query($sql);

            while ($ans and $now = $ans->fetch_assoc()){
              echo "<tr>";
              echo "<td>" . $now["username"] . "</td>";
              echo "<td>" . $now["email"] . "</td>";
              echo "<td>" . $now["usertype"] . "</td>";
              echo "<td>" . $now["mod_timestamp"] . "</td>";
              echo "</tr>";
          }
        ?>

        </tbody>
        </table>
    </div>
    </div>
    <?php
      switch ((int)$_SESSION["usertype"]){
        case 1:
          $usertype = "Manager";break;
        case 2:
          $usertype = "Doctor";break;
        case 3:
          $usertype = "Patient";break;
        case 4:
          $usertype = "Worker";break;
        default:
          $usertype = "GG"; break;
      }
    ?>

    <h1 class = "text-center"> <?php echo $usertype ?> Information </h1>

    <?php
      $now_username = $_SESSION['username'];
      $sql = "select * from users where username='$now_username'";
      $ans = $con->query($sql); 
      $now = $ans->fetch_assoc();
      if ($now["usertypeID"] == 0){
        echo '<h4 class = "text-center">You have not been verified!</h4>';
      }
      else{
        echo '<h4> Your Information! </h4>';

      }
    ?>

    


    <br><br><br>
    <div class = "row text-center">
      <a href="login/logout.php" class="btn btn-default btn-lg">Logout</a>  
    </div>
    <?php
      // echo $_SESSION["username"]."<br>";
      // echo $_SESSION["password"]."<br>";
      // echo $_SESSION["usertype"]."<br>";


    ?>


<?php
  require('./footer.php');        // 导航栏
?> 
