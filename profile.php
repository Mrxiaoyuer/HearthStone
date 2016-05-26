<?php
	session_start();
	require('./header.php');        // 导航栏
  include_once './login/config.php';
	$con = new mysqli($host, $username, $password, $db_name);
    // $username = $_SESSION['username'];
    // $sql = "select * from users where username='$username'";
    // $ans = $con->query($sql);

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
                        <th><?php echo $usertype . " ID" ?></th>
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
              if ($now["usertypeID"] == 0){
                echo '<td>Not Verified!</td>';
              }
              else{
                echo '<td>' . $now["usertypeID"] . '</td>';
              }
              echo "</tr>";
							if($now['usertypeID']!=0){
								switch ((int)$_SESSION["usertype"]){
											case 1:
												$usertype = "Manager";
												break;
											case 2:
												$usertype = "Doctor";
												$Name = $con->query("select Name from Doctor where Work_ID=$now[usertypeID]")->fetch_object()->Name;
												$Salary = $con->query("select Salary from Doctor where Work_ID=$now[usertypeID]")->fetch_object()->Salary;
												echo "Name : " . $Name . "<br>" . "<br>";
												echo "Salary : " . $Salary . "<br>" . "<br>";
												break;
											case 3:
												$usertype = "Patient";
												$Card_No = $con->query("select Card_No from Patient where Pat_ID=$now[usertypeID]")->fetch_object()->Card_No;
												$Name = $con->query("select Pat_name from Patient where Pat_ID=$now[usertypeID]")->fetch_object()->Pat_name;
												echo "Name : " . $Name . "<br>" . "<br>";
												echo "Card_No : " . $Card_No . "<br>" . "<br>";
												$balance = $con->query("select balance from MedicareCard where Card_No=$now[usertypeID]")->fetch_object()->balance;
												echo "Card_Balance : " . $balance . "<br>" . "<br>";
												break;
											case 4:
												$usertype = "Worker";
												break;
											default:
												$usertype = "GG";
												break;
								}
							}
          }
        ?>

        </tbody>
        </table>
    </div>
    </div>



    <br><br><br>
    <div class = "row text-center">
      <a href="login/logout.php" class="btn btn-default btn-lg">Logout</a>
    </div>


<?php
  require('./footer.php');        // 导航栏
?>
