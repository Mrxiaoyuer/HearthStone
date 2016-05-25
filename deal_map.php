<?php 
  require('header.php');        // 导航栏
  	
  // $sql = "select * from users where username='$_GET[id]'";
  // $ans = $con->query($sql);
  // $now = $ans->fetch_assoc();
  // $now["usertypeID"] = $_GET["value"];
  // echo $now["usertypeID"] . "<br>";
  // echo $_GET["value"] . "<br>";
  $sql = "update users set usertypeID = $_GET[value] where username = '$_GET[id]'";
  $con->query($sql);
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
      location.href='map_user.php';
    }
  }
</script>


<?php 
  require('footer.php');  
?>