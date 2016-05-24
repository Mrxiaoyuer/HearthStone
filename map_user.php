<?php 
  require('header.php');        // 导航栏
?>

  	<h2 class = "text-center"> Pending Patient List </h2>
    <div class = "row">
    <div class="col-md-offset-2 col-md-8">
        <table class="table">

            <thead>
            <tr>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>UserType</th>
                        <th>CreateTime</th>
                        <th>Options</th>
            </tr>
            </thead>
        <tbody>
        <?php
            $sql = "select * from users where usertype=3";
            $ans = $con->query($sql);

            while ($ans and $now = $ans->fetch_assoc()){
              echo "<tr>";
              echo "<td>" . $now["username"] . "</td>";
              echo "<td>" . $now["email"] . "</td>";
              echo "<td>" . $now["usertype"] . "</td>";
              echo "<td>" . $now["mod_timestamp"] . "</td>";
              if ($now['usertypeID'] == 0){
				echo "<td>" . "<a href='patient_map.php?id=$now[username]' class='btn btn-info'>Map</a>" . "</td>";
              }
              else{
              	echo "<td>" . $now['usertypeID'] . "</td>";
              }
              echo "</tr>";
          }
        ?>

        </tbody>
        </table>
    </div>
    </div>

    <h2 class = "text-center"> Pending Doctor List </h2>
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
            $sql = "select * from users where usertype=2";
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