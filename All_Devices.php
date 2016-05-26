

<?php
  require('header.php');        // 导航栏
?>


<div id="container">
	<br>
	<h1 class="text-center">Device Information List</h1>
	<br>
	<div class="col-md-offset-2 col-md-8">
		<table class="table">

			<thead>
	        <tr>
						<th>id</th>
						<th>Dev_Name</th>
						<th>State</th>
						<th>Belong_Room</th>
						<th>In_Charge</th>
						<th>Operation</th>
	        </tr>
			</thead>
      <tbody>
          <?php
					$con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
					if(mysqli_connect_errno())
					{
					    echo mysqli_connect_error();
					}

          $ans = $con->query("select * from All_Devices");

          while ($now = $ans->fetch_assoc()){
              	echo "<tr>";
	              	echo "<td>" . $now["id"] . "</td>";
	              	echo "<td>" . $now["Dev_Name"] . "</td>";
	              	echo "<td>" . $now["State"] . "</td>";
	              	echo "<td>" . $now["Belong_Room"] . "</td>";
					echo "<td>" . $now["In_Charge"] . "</td>";
					if ($now["State"] != 0){
						echo "<td>" . "<a href='bd-report.php?id=$now[id]' class='btn btn-info'>ReportBroken</a>" . "&nbsp"."</td>";
					}
					else{
						echo "<td>" ."Wait For Repair"."</td>";
					}
					// echo "<a href='rp-report.php?id=$now[id]' class='btn btn-info'>Fixed</a>" ."</td>";
              	echo "</tr>";
          }
          $ans->close();
          ?>
					<script type="text/javascript">
					$(document).ready(function(){
					  $("button").click(function(){

					  });
					});
					</script>
      </tbody>
		</table>
	</div>
</div>

<?php
  require('footer.php');        // 底部
?>
