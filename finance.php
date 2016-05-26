<?php
  require('header.php');        // 导航栏
?>
<div class = "container">

<div class=" panel panel-info">
	<div class="panel-heading text-center"><h4>Bills Waiting For Reimbursement</h4></div>
	<div class="panel-body">
		<table class="table table-hover">
			<tr>
				<th>bills_ID</th>
				<th>Pat_ID</th>
				<th>Amount</th>
				<th>Date</th>
				<th>Operation</th>
			</tr>
			<tbody>
				<?php
					$cns = $con->query("select * from Bills where state = 0");
					while ($now = $cns->fetch_assoc()){
							echo "<tr>";
							echo "<td>" . $now["id"] . "</td>";
							echo "<td>" . $now["Pat_ID"] . "</td>";
							echo "<td>" . $now["Amount"] . "</td>";
							echo "<td>" . $now["Date"] . "</td>";
							echo "<td>" .  "<a href='Reimburse.php?id=$now[id]' class='btn btn-info'>Reimburse</a>" . "</td>";
							echo "</tr>";
					}
				 ?>
			</tbody>
		</table>
	</div>	
</div>
</div>

<div class = "container">

<div class=" panel panel-info">
	<div class="panel-heading text-center"><h4>Worker Salary</h4></div>
	<div class="panel-body">
		<table class="table table-hover">
			<tr>
				<th>Worker ID</th>
				<th>Name</th>
				<th>Worker Department</th>
				<th>Salary</th>
			</tr>
			<tbody>
				<?php
					$cns = $con->query("select * from Doctor");
					while ($now = $cns->fetch_assoc()){
							echo "<tr>";
							echo "<td> Doctor: " . $now["Work_ID"] . "</td>";
							echo "<td>" . $now["Name"] . "</td>";
							echo "<td>" . $now["Work_at"] . "</td>";
							echo "<td>" . $now["Salary"] . "</td>";
							echo "</tr>";
					}

					$cns = $con->query("select * from Worker");
					while ($now = $cns->fetch_assoc()){
							echo "<tr>";
							echo "<td> Worker: " . $now["Worker_ID"] . "</td>";
							echo "<td>" . $now["Name"] . "</td>";
							echo "<td>" . $now["Work_Type"] . "</td>";
							echo "<td>" . $now["Salary"] . "</td>";
							echo "</tr>";
					}
				 ?>
			</tbody>
		</table>
	</div>	
</div>
</div>


<?php
  require('footer.php');        // 导航栏

?>