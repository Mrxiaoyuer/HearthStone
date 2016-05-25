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

		$ans = $con->query("select * from Prescription where Pat_ID=".$_GET['id']."")->fetch_object();
<<<<<<< HEAD
		if($ans){
		 //echo $ans->Pre_ID;
		}else{
			echo "<h2 class='text-center'>No Record!</h2>";
		}
=======
>>>>>>> efcf9987f89b0c510baadde6e85fb0bcab6c36df
		//echo $ans->Pre_ID;
		?>
	<br>
	<h1 class="text-center">Prescription Details</h1>
	<br><br>
	<form class="col-md-offset-2 col-md-8 jumbotron" action="prescription_success.php" method="post">
	  <div class="form-group">
	    <label>Pre_ID</label>
<<<<<<< HEAD
			<input class="form-control" name="Pre_ID" value=<?php if($ans) {echo $ans->Pre_ID;} else {echo "none";}?> >
	  </div>
	  <div class="form-group">
	    <label>Pat_ID</label>
	    <input class="form-control" name="Pat_ID" value=<?php if($ans) {echo $ans->Pat_ID;} else {echo "none";};?>>
	  </div>
		<div class="form-group">
			<label>Doc_ID</label>
			<input class="form-control" name="Doc_ID" value=<?php if($ans) {echo $ans->Doc_ID;} else {echo "none";}?>>
=======
			<input class="form-control" name="Pre_ID" value=<?php echo $ans->Pre_ID;?> readonly>
	  </div>
	  <div class="form-group">
	    <label>Pat_ID</label>
	    <input class="form-control" name="Pat_ID" value=<?php echo $ans->Pat_ID;?> readonly>
	  </div>
		<div class="form-group">
			<label>Doc_ID</label>
			<input class="form-control" name="Doc_ID" value=<?php echo $ans->Doc_ID;?> readonly>
>>>>>>> efcf9987f89b0c510baadde6e85fb0bcab6c36df
		</div>
		<div class="form-group">
			<label>Pre_date</label>
			<input class="form-control" name="Pre_date" placeholder="Prescription_Date">
		</div>
		<div class="form-group">
			<label>Content</label>
			<input class="form-control" name="content" placeholder="Content">
		</div>
		<button type="submit" class="btn btn-info">Submit</button>
	</form>
</div>

</body>
</html>
