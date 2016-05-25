<?php 
	session_start();
	require('./header.php');        // 导航栏
  include_once './login/config.php';
	$con = new mysqli($host, $username, $password, $db_name);
    $username = $_SESSION['username'];
    $sql = "select * from users where username='$username'";
    $ans = $con->query($sql);

?>
    <h1 class = "text-center"> User Information </h1>

    <a href="login/logout.php" class="btn btn-default btn-lg">Logout</a>  
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
            $username = $_SESSION['username'];
            $sql = "select * from users where username='$username'";
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


<?php
  require('./footer.php');        // 导航栏
?> 
