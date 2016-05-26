<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Beautiful design tables in HTML in the style of a zebra.</title>
	<script src="./js/jquery.min.js"></script>
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
<?php
  if (!session_id()) session_start();
  ob_start();
?>
<body>

<div id="container">
	<br>
	<h1 class="text-center">Arrange Operation Details</h1>
	<br><br>
	<form class="col-md-offset-2 col-md-8 jumbotron" action="surgery_success.php" method="post">
	  <div class="form-group">
	    <label>OpeartionTime</label>
	    <input class="form-control" name="OpTime" placeholder="OperationTime">
	  </div>
	  <div class="form-group">
	    <label>Doctor_ID</label>
	    <input class="form-control" name="Doctor_ID" value=<?php if($_SESSION["usertypeID"] && $_SESSION["usertype"] == 2) {echo $_SESSION["usertypeID"];} else {echo "none";}?> readonly>
	  </div>
		<div class="form-group">
			<label>Patient_ID</label>
			<input class="form-control" name="Patient_ID" value=<?php if($_GET["id"]) {echo $_GET["id"];} else {echo "none";};?> readonly>
		</div>
		<div class="form-group">
			<label>OpRoom_ID</label>
			<input class="form-control" name="OpRoom_ID" placeholder="OpRoom_ID">
		</div>
		<button type="submit" class="btn btn-info">Submit</button>
	</form>
</div>

</body>
</html>
