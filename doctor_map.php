<?php 
  require('header.php');        // 导航栏
  $pending_username = $_GET['id'];

?>

<h2 class = "text-center"> Doctor List </h2>
<div class = "row">
    <div class="col-md-offset-2 col-md-8">
        <table class="table">

            <thead>
            <tr>
                        <th>Doc_ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Work_at</th>
                        <th>Option</th>
            </tr>
            <?php 
            	echo "<strong>Pending patient:</strong> " . $pending_username . "<br>";
            ?>
            </thead>
        <tbody>
        <?php
            $sql = "select * from Doctor";
  			$ans = $con->query($sql);


            while ($ans and $now = $ans->fetch_assoc()){
              echo "<tr>";
              echo "<td>" . $now["Work_ID"] . "</td>";
              echo "<td>" . $now["Name"] . "</td>";
              echo "<td>" . $now["Salary"] . "</td>";
              echo "<td>" . $now["Work_at"] . "</td>";

              echo "<td>" . '<form action="" method="post">
						<input type="hidden" name="click" value="' . $now["Work_ID"] . '"/>
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
	<h2 class = "text-center"> No Match? Create a new Doctor!</h2>

	<form class="form-signup" id="newdoctor" name="newdoctor" method="post" action="">
        <input name="doc_name" id="doc_name" type="text" class="form-control" placeholder="Doctor Name" autofocus>
        <br>
        <input name="work_at" id="work_at" type="text" class="form-control" placeholder="Department">
        <br>
		<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Create Doctor And Match</button>
	</form>

</div>


<?php
	if (!empty($_POST['click'])){
		$sql = "update users set usertypeID = $_POST[click] where username = '$_GET[id]'";
  		$con->query($sql);
  		echo $sql;

  		$url = "map_user.php";  
		echo "< script language='javascript' 
		type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "< /script>"; 
	}
	if (!empty($_POST['doc_name'])){
		$sql = "select max(Work_ID) as id FROM HearthStone.Doctor order by Work_ID DESC";
		$ans = $con->query($sql);
		$now = $ans->fetch_assoc();
		// echo $sql . "<br>" . $now["id"] . "<br>";
		
		$next_id = (int)$now["id"] + 1;

		$sql = "insert into Doctor (`Work_ID`, `Name`) VALUES ($next_id, '$_POST[doc_name]')";
		// echo $sql . "<br>";
		echo $con->query($sql);
		$sql = "update users set usertypeID = $next_id where username = '$_GET[id]'";
  		$con->query($sql);

  		$url = "map_user.php";  
		echo "< script language='javascript' 
		type='text/javascript'>";  
		echo "window.location.href='$url'";  
		echo "< /script>";  
	}

  require('footer.php');        // 导航栏

?>