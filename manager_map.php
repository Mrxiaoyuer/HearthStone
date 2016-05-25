<?php 
  require('header.php');        // 导航栏
  $pending_username = $_GET['id'];
?>

<h2 class = "text-center"> Manager List </h2>
<div class = "row">
    <div class="col-md-offset-2 col-md-8">
        <table class="table">

            <thead>
            <tr>
                        <th>Pat_ID</th>
                        <th>Pat_name</th>
                        <th>Sex</th>
                        <th>Bed_No</th>
                        <th>Primary_doc</th>
                        <th>Option</th>
            </tr>
            <?php 
            	echo "<strong>Pending patient:</strong> " . $pending_username . "<br>";
            ?>
            </thead>
        <tbody>
        <?php
            $sql = "select * from Patient";
  			$ans = $con->query($sql);


            while ($ans and $now = $ans->fetch_assoc()){
              echo "<tr>";
              echo "<td>" . $now["Pat_ID"] . "</td>";
              echo "<td>" . $now["Pat_name"] . "</td>";
              echo "<td>" . $now["Sex"] . "</td>";
              echo "<td>" . $now["Bed_No"] . "</td>";
              echo "<td>" . $now["Primary_doc"] . "</td>";

              //echo "<td>" . "<a href='deal_map.php?id=$pending_username&value=$now[Pat_ID]' class='btn btn-info'>Match</a>" . "</td>";
              $sss = 1;
              echo "<td>" . '<form action="" method="post">
						<input type="hidden" name="click" value="' . $now["Pat_ID"] . '"/>
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
	<h2 class = "text-center"> No Match? Create a new Patient!</h2>

	<form class="form-signup" id="newpatient" name="newpatient" method="post" action="">
        <input name="pat_name" id="pat_name" type="text" class="form-control" placeholder="Patient Name" autofocus>
        <br>
        Male: <input type="radio" checked="checked" name="Sex" value="M" />
        Female: <input type="radio" name="Sex" value="F" />
        <br><br>
        <input name="primary_doc" id="primary_doc" type="text" class="form-control" placeholder="Primary Doctor ID">
        <br>
		<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Create Patient And Match</button>
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
	if (!empty($_POST['pat_name'])){
		$sql = "select max(Pat_ID) as id FROM HearthStone.Patient order by Pat_ID DESC";
		$ans = $con->query($sql);
		$now = $ans->fetch_assoc();
		// echo $sql . "<br>" . $now["id"] . "<br>";
		
		$next_id = (int)$now["id"] + 1;

		$sql = "insert into Patient (`Pat_ID`, `Pat_name`, `Sex`, `Primary_doc`) VALUES ($next_id, '$_POST[pat_name]', '$_POST[Sex]', $_POST[primary_doc])";
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