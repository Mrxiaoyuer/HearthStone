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
      <div class="col-md-offset-2 col-md-8">

        <div class="jumbotron">
          <div class="alert alert-success text-center">You have been successfully logged in.</div>
          &nbsp &nbsp If this is your first time to sign in, please be patient and wait for manager's Authenticatation to obtain full access . . . .
        </div>
      </div>
    </div> <!-- /container -->

<?php
  require('footer.php');        // 底部
?>
