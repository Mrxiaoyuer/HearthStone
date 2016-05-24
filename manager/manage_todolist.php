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
						<th>Option</th>
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
				echo "<td>" . "<a href='bd-report.php?id=$now[id]' class='btn btn-info'>Break</a>" . "&nbsp";
				echo "<a href='rp-report.php?id=$now[id]' class='btn btn-info'>Fixed</a>" ."</td>";
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

</body>
</html>
