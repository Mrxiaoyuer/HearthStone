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
    <?php
  require('ManageHeader.php');        // 导航栏
?>


<div id="container">
<div class="col-md-offset-2 col-md-8">
    <table class="table">
    <h2 class = "text-center">Room List</h2>
        <thead>
            <tr>
                <th>Room_No</th>
                <th>Bed_id</th>
                <th>Belong_Dep</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $con = new mysqli("57306aae8f8cf.bj.cdb.myqcloud.com:5651", "cdb_outerroot", "jiangli77", "HearthStone");
            $ans = $con->query("select * from Bed natural join Room, Department where Belong_dep = Dep_No and Belong_room = Room_No");

            while ($room = $ans->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $room["Belong_room"] . "</td>";
                echo "<td>" . $room["inroom_id"] . "</td>";
                echo "<td>" . $room["Dep_name"]. "</td>";

                if($room["Is_used"] == 0)
                {
                    echo "<td>" . "Empty" . "</td>";
                }
                else
                {
                    echo "<td>" . "Occupy". "</td>";
                }
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
