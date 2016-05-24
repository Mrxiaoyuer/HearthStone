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
<h1 class="text-center"> Patient's Information List</h1>
<br>
<div id="container">
	<br>
	<div class="col-md-offset-1 col-md-3 panel panel-info">
		<div class="panel-body">
	    <?php

			$con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
			if(mysqli_connect_errno()){
					echo mysqli_connect_error();
			}

	    $ans = $con->query("select * from Patient where Pat_ID=".$_GET['id']."");

	    while ($now = $ans->fetch_assoc()){
	        echo "Pat_ID : " . $now["Pat_ID"] . "<br>". "<br>";
					echo "Pat_name : " . $now["Pat_name"] . "<br>". "<br>";
					echo "Sex : " . $now["Sex"] . "<br>". "<br>";
					echo "Bed_No : " . $now["Bed_No"] . "<br>". "<br>";
					echo "Primary_doc : " . $now["Primary_doc"] . "<br>". "<br>";
					$bns = $con->query("select content from Prescription where Pat_ID= $now[Primary_doc] and Doc_ID=$now[Pat_ID]")->fetch_object()->content;
					echo "Prescription: " . $bns . "<br>" . "<br>";
					echo "<a href='Prescription.php?id=$now[Pat_ID]' class='btn btn-info'>RePrescrip</a>" . "&nbsp";
					echo "<a href='addsurgery.php?id=$now[Pat_ID]' class='btn btn-info'>ArrangeOper</a>";
	    }
	    ?>
		</div>
	</div>
	<div class="col-md-offset-1 col-md-6 panel panel-info">
		<div class="panel-heading text-center"><h4>Opeartion List</h4></div>
		<div class="panel-body">
			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>OpTime</th>
					<th>Doc_ID</th>
					<th>OpRoom_ID</th>
					<th>Operation</th>
				</tr>
				<tbody>
					<?php
						$cns = $con->query("select * from Surgery where Patient_ID=".$_GET['id']."");
						while ($now = $cns->fetch_assoc()){
								echo "<tr>";
								echo "<td>" . $now["id"] . "</td>";
								echo "<td>" . $now["OpTime"] . "</td>";
								echo "<td>" . $now["Doctor_ID"] . "</td>";
								echo "<td>" . $now["OpRoom_ID"] . "</td>";
								echo "<td>" .  "<a href='cancelSurgery.php?id=$now[id]' class='btn btn-info'>Cancel</a>" . "</td>";
								echo "</tr>";
						}
					 ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-offset-1 col-md-6 panel panel-info">
		<div class="panel-heading text-center"><h4>Rountine Bills</h4></div>
		<div class="panel-body">
			<table class="table table-hover">
				<tr>
					<th>bills_ID</th>
					<th>Pat_ID</th>
					<th>Amount</th>
					<th>Card_Balance</th>
					<th>Date</th>
					<th>Operation</th>
				</tr>
				<tbody>
					<?php
						$cns = $con->query("select * from Bills where Pat_ID=".$_GET['id']."");
						while ($now = $cns->fetch_assoc()){
								echo "<tr>";
								echo "<td>" . $now["id"] . "</td>";
								echo "<td>" . $now["Pat_ID"] . "</td>";
								echo "<td>" . $now["Amount"] . "</td>";
								echo "<td>" . $now["Card_Balance"] . "</td>";
								echo "<td>" . $now["Date"] . "</td>";
								echo "<td>" .  "<a href='Reimburse.php?id=$now[id]' class='btn btn-info'>Reimburse</a>" . "</td>";
								echo "</tr>";
						}
					 ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
