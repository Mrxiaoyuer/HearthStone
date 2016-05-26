<?php 
  require('ManageHeader.php');        // 底部
?> 
<div id="container">
  <div class = "container col-md-offset-2 col-md-8">
	<table class="table">

	  <?php
	  	echo "<br><h3 class = 'text-center'>Pending Patient</h3><br><br>";
		echo "<th>" . "Pat_name" . "<br >". "</th>";
		echo "<th>" . "Sex" . "<br >". "</th>";
		echo "<th>" . "Primary_doc" . "<br >". "</th>";
		echo "<th>" . "Department" . "<br >". "</th>";
	  $con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
		if(mysqli_connect_errno())
		{
		    echo mysqli_connect_error();
		}
		$ans = $con->query("select * from Patient natural join Doctor, Department where Work_at = Dep_No and Primary_doc = Work_ID");
		while($now = $ans->fetch_assoc()){
			if($now["Assigned"] == 0)
			{
				$Dep_No = $now["Dep_No"];
				echo "<tr>";
				echo "<td>" . $now["Pat_name"] . "</td>";
				echo "<td>" . $now["Sex"] . "</td>";
				echo "<td>" . $now["Primary_doc"] . "</td>";
				echo "<td>" . $now["Dep_name"] . "</td>";
				echo "<tr>";



			}

		}
	echo "</table>";
	echo '<table class="table">';

		echo "<br><h3 class = 'text-center'>Empty Room List</h3><br><br>";
		echo "<th>" . "Room_Num" . "<br >". "</th>";
		echo "<th>" . "Bed_Num" . "<br >". "</th>";
		echo "<th>" . "Department" . "<br >". "</th>";
		echo "<th>" . "Opreation" . "<br >". "</th>";

		$bns = $con->query("select * from Bed natural join Room, Department where Dep_No = Belong_dep and Dep_No = $Dep_No and Is_used = 0;");

		while ($room = $bns->fetch_assoc()){
        	echo "<tr>";
        	echo "<td>" . $room["Belong_room"] . "</td>";
        	echo "<td>" . $room["inroom_id"] . "</td>";
        	echo "<td>" . $room["Dep_name"]. "</td>";
        	echo "<td>" . "<a href='_AssignAction.php?id=$room[Bed_No]' class='btn btn-info'>Assign</a>" . "</td>";
        	echo "</tr>";
    	}
		

		$ans->close();
			$bns->close();
	  ?>
	</table>
</div>
</div>

<?php 
  require('../footer.php');        // 底部
?> 
