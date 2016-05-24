<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Beautiful design tables in HTML in the style of a zebra.</title>
	<script src="./js/jquery.js"></script>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="css/style.css" type="text/css">-->
</head>

<body>
<br>
<h1 class="text-center"> Docotr's Information List</h1>
<br>
<div id="container">
	<br>
	<br>
	<div class="col-md-offset-1 col-md-7 panel panel-info">
		<div class="panel-heading">
			<div class="text-center">My Patients</div>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<tr>
					<th>Pat_ID</th>
					<th>Pat_Name</th>
					<th>Sex</th>
					<th>Bed_No</th>
					<th>Details</th>
				</tr>
				<tbody>
					<?php
					$con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
					if(mysqli_connect_errno()){
							echo mysqli_connect_error();
					}

					$bns = $con->query("select * from Patient where Primary_doc=".$_GET['id']."");

					while ($now = $bns->fetch_assoc()){
							echo "<tr>";
							echo "<td>" . $now["Pat_ID"] . "</td>";
							echo "<td>" . $now["Pat_name"] . "</td>";
							echo "<td>" . $now["Sex"] . "</td>";
							echo "<td>" . $now["Bed_No"] . "</td>";
							echo "<td>" . "<a href='patient.php?id=$now[Pat_ID]' class='btn btn-info'>Details</a>" . "</td>";
							echo "</tr>";
					}
					$bns->close();
					?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-offset-1 col-md-2 panel panel-info">
		<div class="panel-heading">
			<div class="text-center">My Personal Information</div>
		</div>
		<div class="panel-body">
	    <?php

	    $ans = $con->query("select * from Doctor where Work_ID=".$_GET['id']."");

	    while ($now = $ans->fetch_assoc()){
	        echo "Work_ID : " . $now["Work_ID"] . "<br>". "<br>";
					echo "Salary : " . $now["Salary"] . "<br>". "<br>";
					echo "Work_at : Department-" . $now["Work_at"] . "<br>". "<br>";
					echo "Name : " . $now["Name"] . "<br>". "<br>";
	    }
	    ?>
		</div>
	</div>

</body>
</html>
