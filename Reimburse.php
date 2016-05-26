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

<body>

<div id="container">
	<?php
		$con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
		if(mysqli_connect_errno())
		{
				echo mysqli_connect_error();
		}

		$ans = $con->query("select * from Bills where id=".$_GET['id']."")->fetch_object();
		if($ans){
		 //echo $ans->Pat_ID;
		}else{
			echo "No Record!";
		}
		?>
	<br>
	<h1 class="text-center">Reimburse Bills Details</h1>
	<br><br>
	<form class="col-md-offset-2 col-md-8 jumbotron" action="reimburse_success.php" method="post">
	  <div class="form-group">
	    <label>id</label>
			<input class="form-control" name="id" value=<?php echo $ans->id;?> readonly>
	  </div>
	  <div class="form-group">
	    <label>Pat_ID</label>
	    <input class="form-control" name="Pat_ID" value=<?php echo $ans->Pat_ID;?> readonly>
	  </div>
		<div class="form-group">
			<label>Amount</label>
			<input class="form-control" name="Amount" value=<?php echo $ans->Amount;?> readonly>
		</div>
		<div class="form-group">
			<label>Date</label>
			<input class="form-control" name="Date" value=<?php echo $ans->Date ?>>
		</div>
		<div class="form-group">
			<label>Reimburse Ratio</label>
			<input class="form-control" name="Reimburse_Ratio" value='0.5'>
		</div>
		<button type="submit" class="btn btn-info">Submit</button>
	</form>
</div>

</body>
</html>
