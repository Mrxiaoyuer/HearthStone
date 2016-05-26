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
	<br>
	<br><br>
	<?php
		$data=$_POST;
		$con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
		if(mysqli_connect_errno())
		{
				echo mysqli_connect_error();
		}
		$amount = $con->query("select Amount from Bills where id=$data[id]")->fetch_object()->Amount;
		$balance = $con->query("select balance from Patient_Card where Pat_ID=$data[Pat_ID]")->fetch_object()->balance;
		$Card_No = $con->query("select Card_No from Patient_Card where Pat_ID=$data[Pat_ID]")->fetch_object()->Card_No;
		//echo $amount*$data['Reimburse_Ratio'] . "<br>";
		
		// echo "amount = " . $amount . "<br>";
		// echo "balance = " . $balance . "<br>";
		// echo "Card_No = " . $Card_No . "<br>";
		
		$amount = $amount*$data["Reimburse_Ratio"];
		$balance = $balance + $amount;
		//echo "<br />" . $balance;
		$sql = "update MedicareCard SET `balance`= $balance WHERE `Card_No`=$Card_No";
		// echo $sql;

		$ans = $con->query($sql);
		//echo $data['id'];
		if(!$ans){
			echo "<h1 class='text-center'>Reimburse Failed...</h1>";
			echo "<h1 class='text-center'>Please Try Again....</h1>";
		}else{
			$sql = "update Bills SET state = 1 where id=$data[id]";
			$ans = $con->query($sql);
			echo "<h1 class='text-center'>Reimburse Successfully...</h1>";
		}
	 ?>
	 <script type="text/javascript">
		 onload=function(){
			 setInterval(go, 1000);
		 };
		 var x=1;
		 function go(){
			 x--;
			 if(x>0){
				 document.getElementById("sp").innerHTML=x;
			 }else{
				 <?php
				 	echo "location.href='patient.php?id=$data[Pat_ID]'";
				 ?>
			 }
		 }
	 </script>
</div>

</body>
</html>
