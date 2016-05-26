<?php
  require('header.php');        // 导航栏
  $pending_username = $_GET['id'];

?>

<h2 class = "text-center"> Worker List </h2>
<div class = "row">
    <div class="col-md-offset-2 col-md-8">
        <table class="table">

            <thead>
            <tr>
                        <th>Worker_ID</th>
                        <th>Name</th>
                        <th>Work_Type</th>
                        <th>Option</th>
            </tr>
            <?php
            	echo "<strong>Pending patient:</strong> " . $pending_username . "<br>";
            ?>
            </thead>
        <tbody>
        <?php
            $sql = "select * from Worker";
  			$ans = $con->query($sql);


            while ($ans and $now = $ans->fetch_assoc()){
              echo "<tr>";
              echo "<td>" . $now["Worker_ID"] . "</td>";
              echo "<td>" . $now["Name"] . "</td>";
              echo "<td>" . $now["Work_Type"] . "</td>";

              //echo "<td>" . "<a href='deal_map.php?id=$pending_username&value=$now[Pat_ID]' class='btn btn-info'>Match</a>" . "</td>";
              $sss = 1;
              echo "<td>" . '<form action="" method="post">
						<input type="hidden" name="click" value="' . $now["Worker_ID"] . '"/>
						<input type="submit" name="button" value="Match" class="btn btn-info"/>
						</form>' . "</td>";
              echo "</tr>";
          }
        ?>

        </tbody>
        </table>
	</div>
</div>

<div>
	<h2 class = "text-center"> No Match? Create a new Worker!</h2>

	<form class="form-signup" id="newworker" name="newworker" method="post" action="">
        <input name="worker_name" id="worker_name" type="text" class="form-control" placeholder="worker Name" autofocus>
        <br>
        <input name="work_type" id="work_type" type="text" class="form-control" placeholder="Work Type">
        <br>
		<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Create Worker And Match</button>
	</form>

</div>


<?php
	if (!empty($_POST['click'])){
		$sql = "update users set usertypeID = $_POST[click] where username = '$_GET[id]'";
  		$con->query($sql);
  		echo $sql;

  	header("Location: ./map_user.php");
	}
	if (!empty($_POST['worker_name'])){
		$sql = "select max(Worker_ID) as id FROM HearthStone.Worker order by Pat_ID DESC";
		$ans = $con->query($sql);
		$now = $ans->fetch_assoc();
		// echo $sql . "<br>" . $now["id"] . "<br>";

		$next_id = (int)$now["id"] + 1;

		$sql = "insert into Patient (`Worker_ID`, `Work_Type`) VALUES ($next_id, '$_POST[work_type]')";
		// echo $sql . "<br>";
		echo $con->query($sql);
		$sql = "update users set usertypeID = $next_id where username = '$_GET[id]'";
  		$con->query($sql);

  	header("Location: ./map_user.php");
	}

  require('footer.php');        // 导航栏

?>
