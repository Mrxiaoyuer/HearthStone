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
	<h1 class="text-center">Surgery List</h1>
  <br /><br /><br /><br />
	<table class="table">
	  <?php
		echo "<th>" . "id" . "<br >". "</th>";
		echo "<th>" . "OpDate" . "<br >". "</th>";
		echo "<th>" . "Doc_ID" . "<br >" . "</th>";
		echo "<th>" . "OpRoom" . "<br >" . "</th>";
	  $con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
		if(mysqli_connect_errno())
		{
		    echo mysqli_connect_error();
		}
		$ans = $con->query("select * from Doctor_Todolist");
		while($now = $ans->fetch_assoc()){
			echo "<tr>";
			echo "<td>" . $now["id"] . "</td>";
			echo "<td>" . $now["OpDate"] . "</td>";
			echo "<td>" . $now["Doc_ID"] . "</td>";
			echo "<td>" . $now["OpRoom"] . "</td>";
			echo "</tr>";
		}
	  ?>
	</table>
</div>

</body>
</html>
