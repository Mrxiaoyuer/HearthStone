<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Beautiful design tables in HTML in the style of a zebra.</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

<div id="container">   

	<table class="zebra">
    <caption>Beautiful design tables in HTML in the style of a zebra.</caption>
		<thead>
        	<tr>
				<th>id1</th>
				<th>Name</th>
				<th>Phone</th>
				<th>ID</th>
            </tr>
		</thead>
        <tbody>
            <?php
            $con = new mysqli("localhost", "root", "shaoshuai", "hearthstone");
            $ans = $con->query("select * from mytable");
            
            while ($now = $ans->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $now["id1"] . "</td>";
                echo "<td>" . $now["Name"] . "</td>";
                echo "<td>" . $now["Phone"] . "</td>";
                echo "<td>" . $now["ID"] . "</td>";
                echo "</tr>";
            }
            $ans->close();
            ?>
        </tbody>
	</table>
</div>
    
</body>
</html>