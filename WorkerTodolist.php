<?php 
  require('header.php');        // 底部
?> 

<div id="container">
  <br /><br /><br /><br />
	<table class="table">
	  <?php
		echo "<th>" . "id" . "<br >". "</th>";
		echo "<th>" . "Dev_Name" . "<br >". "</th>";
		echo "<th>" . "Descrip" . "<br >" . "</th>";
	  $con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
		if(mysqli_connect_errno())
		{
		    echo mysqli_connect_error();
		}
		$ans = $con->query("select * from Worker_Todolist");
		while($now = $ans->fetch_assoc()){
			echo "<tr>";
			echo "<td>" . $now["id"] . "</td>";
			echo "<td>" . $now["Dev_Name"] . "</td>";
			echo "<td>" . $now["Descrip"] . "</td>";
			echo "</tr>";
		}
	  ?>
	</table>
</div>

<?php 
  require('footer.php');        // 底部
?> 
