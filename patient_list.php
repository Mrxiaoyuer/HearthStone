<?php
  require('header.php');        // 导航栏

?>


<h2 class = "text-center"> Patient Information List </h2>
<div class = "row">
    <div class="col-md-offset-2 col-md-8">
        <table class="table">

            <thead>
            <tr>
                        <th>Pat_ID</th>
                        <th>Pat_name</th>
                        <th>Sex</th>
                        <th>Bed_No</th>
                        <th>Primary_doc</th>
                        <th>Option</th>
            </tr>
            </thead>
        <tbody>
        <?php
            $sql = "select * from Patient";
  			    $ans = $con->query($sql);
            while ($ans and $now = $ans->fetch_assoc()){
	    	  $doc_name = $con->query("select Name from Doctor where Work_ID=".$now["Primary_doc"]."")->fetch_assoc();
              echo "<tr>";
              echo "<td>" . $now["Pat_ID"] . "</td>";
              echo "<td>" . $now["Pat_name"] . "</td>";
              echo "<td>" . $now["Sex"] . "</td>";
              echo "<td>" . $now["Bed_No"] . "</td>";
              echo "<td>" . $doc_name["Name"] . "</td>";

              //echo "<td>" . "<a href='deal_map.php?id=$pending_username&value=$now[Pat_ID]' class='btn btn-info'>Match</a>" . "</td>";
              echo "<td><a href = './patient.php?id=" . $now["Pat_ID"] ."'>Details</td>";
              echo "</tr>";
          }
        ?>

        </tbody>
        </table>
	</div>
</div>