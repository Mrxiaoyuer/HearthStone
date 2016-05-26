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


<?php
  require('footer.php');        // 导航栏

?>