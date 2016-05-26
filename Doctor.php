<?php
  require('header.php');        // 底部
?>
<br>
<h1 class="text-center"> Docotr's Information List</h1>
<br>
<?php
  $con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
	if(mysqli_connect_errno()){
			echo mysqli_connect_error();
	}
  if(!empty($_GET['id'])) {
    echo "<div id='container'>
    	<br>
    	<br>
    	<div class='col-md-offset-1 col-md-7 panel panel-info'>
    		<div class='panel-heading'>
    			<div class='text-center'>My Patients</div>
    		</div>
    		<div class='panel-body'>
    			<table class='table table-hover'>
    				<tr>
    					<th>Pat_ID</th>
    					<th>Pat_Name</th>
    					<th>Sex</th>
    					<th>Bed_No</th>
    					<th>Details</th>
    				</tr>
    				<tbody>";
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
      }else{
        echo "<div id='container'>
        	<br>
        	<br>
        	<div class='col-md-offset-2 col-md-8 panel panel-info'>
        		<div class='panel-heading'>
        			<div class='text-center'>Doctor Lists</div>
        		</div>
        		<div class='panel-body'>
        			<table class='table table-hover'>
        				<tr>
        					<th>Work_ID</th>
        					<th>Work_at</th>
        					<th>Name</th>
        					<th>Salary</th>
                  <th>Details</th>
        				</tr>
        				<tbody>";
        $bns = $con->query("select * from Doctor");
        while ($now = $bns->fetch_assoc()){
  					echo "<tr>";
  					echo "<td>" . $now["Work_ID"] . "</td>";
  					echo "<td>" . $now["Work_at"] . "</td>";
  					echo "<td>" . $now["Name"] . "</td>";
  					echo "<td>" . $now["Salary"] . "</td>";
            echo "<td>" . "<a href='Doctor.php?id=$now[Work_ID]' class='btn btn-info'>Details</a>" . "</td>";
  					echo "</tr>";
  			}
      }
					?>
				</tbody>
			</table>
		</div>
	</div>


	    <?php

	    if(!empty($_GET['id'])) {
        echo
        " <div class='col-md-offset-1 col-md-2 panel panel-info'>
      		<div class='panel-heading'>
      		  <div class='text-center'>My Personal Information</div>
      		</div>
      		<div class='panel-body'>";
        $ans = $con->query("select * from Doctor where Work_ID=".$_GET['id']."");
	      while ($now = $ans->fetch_assoc()){
	        echo "Work_ID : " . $now["Work_ID"] . "<br>". "<br>";
					echo "Work_at : Department-" . $now["Work_at"] . "<br>". "<br>";
					echo "Name : " . $now["Name"] . "<br>". "<br>";
	       }
       }
	    ?>
		</div>
	</div>

<?php
if(!empty($_GET['id'])){
  echo
  "<div class='col-md-offset-1 col-md-7 panel panel-info'>
      <div class='panel-heading'>
        <div class='text-center'>Surgery List</div>
      </div>
      <div class='panel-body'>
        <table class='table table-hover'>
          <tr>
            <th>id</th>
            <th>OpTime</th>
            <th>Patient_ID</th>
            <th>OpRoom_ID</th>
            <th>Details</th>
          </tr>
          <tbody>";
		$bns = $con->query("select * from Surgery where Doctor_ID=".$_GET['id']."");

		while ($now = $bns->fetch_assoc()){
				echo "<tr>";
				echo "<td>" . $now["id"] . "</td>";
				echo "<td>" . $now["OpTime"] . "</td>";
				echo "<td>" . $now["Patient_ID"] . "</td>";
				echo "<td>" . $now["OpRoom_ID"] . "</td>";
				echo "<td>" . "<a href='patient.php?id=$now[Patient_ID]' class='btn btn-info'>Details</a>" . "</td>";
				echo "</tr>";
		}
		$bns->close();
    }
?>
				</tbody>
			</table>
		</div>
	</div>


</body>
</html>
<?php
  require('footer.php');        // 底部
?>
