<?php 
  require('header.php');        // 导航栏
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
  require('footer.php');        // 导航栏

?>