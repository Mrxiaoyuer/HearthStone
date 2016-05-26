<?php 
  require('ManageHeader.php');        // 底部
?> 
<div id="container">
  <br /><br /><h1 class = "text-center">Room To Be Recycled </h1><br /><br />
  	<div class = "container">
	<table class="table">
	  <?php
		echo "<th>" . "Pat_name" . "<br >". "</th>";
		echo "<th>" . "Sex" . "<br >". "</th>";
		echo "<th>" . "Primary_doc" . "<br >". "</th>";
		echo "<th>" . "Department" . "<br >". "</th>";
		echo "<th>" . "State" . "<br >". "</th>";
	  $con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
		if(mysqli_connect_errno())
		{
		    echo mysqli_connect_error();
		}
		$ans = $con->query("select * from Patient natural join Doctor, Department where Work_at = Dep_No and Primary_doc = Work_ID");
		while($now = $ans->fetch_assoc()){
			if($now["Assigned"] == -1 && $now["Bed_No"] != 0)
			{
				echo "<tr>";
				echo "<td>" . $now["Pat_name"] . "</td>";
				echo "<td>" . $now["Sex"] . "</td>";
				echo "<td>" . $now["Primary_doc"] . "</td>";
				echo "<td>" . $now["Dep_name"] . "</td>";
				echo "<td>" . "<a href='_RecycleAction.php?id=$now[Pat_ID]' class='btn btn-info'>Recycle</a>" . "</td>";
			}
			
		}
	  ?>
	</table>
	</div>
</div>

<?php 
  require('../footer.php');        // 底部
?> 
