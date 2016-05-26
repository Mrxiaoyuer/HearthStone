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
		$Dep_No = 0;
		$Pat_id = 0;
		$Assigned = -1;
		while($now = $ans->fetch_assoc()){
			if($now["Assigned"] == 0)
			{
				$Dep_No = 1;
				$Pat_id = $now["Pat_ID"];
				$Assigned = $now["Assigned"]; 
				echo "<tr>";
				echo "<td>" . $now["Pat_name"] . "</td>";
				echo "<td>" . $now["Sex"] . "</td>";
				echo "<td>" . $now["Primary_doc"] . "</td>";
				echo "<td>" . $now["Dep_name"] . "</td>";
				echo "<tr>";
			}
		}
			
		
		$ans->close();
	  ?>
	</table>
</div>
</div>

<?php 
  require('../footer.php');        // 底部
?> 
