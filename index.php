<?php
  session_start();
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
  if(!isset($_SESSION['username'])){
    header("location:login/main_login.php");
  }
  elseif ($_SESSION['usertype'] == 1){
    header("location:Manager/ManageMain.php");
  }
?>
<?php 
  require('header.php');        // 导航栏
?>

    <div class="container">
      <h1 class = "text-center">Hospital Logistics System</h1>
      <br>
      <div class="form-signin">
        <div class="alert alert-success">You have been <strong>successfully logged in</strong>.</div>
        <a href="login/logout.php" class="btn btn-default btn-lg btn-block">Logout</a>
      </div>
    </div> <!-- /container -->

<?php 
  require('footer.php');        // 底部
?> 
