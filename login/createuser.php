<html>
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
      location.href='main_login.php';
    }
  }
</script>


<?php
//equire 'scripts/PHPMailer/class.phpmailer.php';
require 'scripts/class.loginscript.php';
include_once 'config.php';

	//Pull username, generate new ID and hash password
	$newid = uniqid (rand(), false);
	$newuser = $_POST['newuser'];
	$newpw = password_hash($_POST['password1'], PASSWORD_DEFAULT);
	$pw1 = $_POST['password1'];
	$pw2 = $_POST['password2'];
	$usertype = $_POST['usertype'];
	// if (isset($_POST['usertype'])){

	// }
	// else{
	// 	$usertype = 1;
	// }


	//Enables moderator verification (overrides user self-verification emails)
	if (isset($admin_email)){
		$newemail = $admin_email;
	}
	else{
		$newemail = $_POST['email'];
	}
//Validation rules
if ($pw1 != $pw2){
	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password fields must match</div><div id="returnVal" style="display:none;">false</div>';
}
elseif (strlen($pw1) < 4){											// 密码长度
	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password must be at least 4 characters</div><div id="returnVal" style="display:none;">false</div>';
}
elseif(!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true ){		// 邮箱格式验证
	echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Must provide a valid email address</div><div id="returnVal" style="display:none;">false</div>';
}
//Validation passed
else{
	if (isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && isset($_POST['password1']) && !empty(str_replace(' ', '', $_POST['password1'])) ){

		//Tries inserting into database and add response to variable
		$a = new newUserForm;
		$response = $a->createUser($newuser, $newid, $newemail, $newpw, $usertype);
		//Success
		if($response == 'true'){
      echo "<div class='container'>";
			echo '<br><br><br><br><div class="col-md-offset-2 col-md-offset-8"><h2 class="alert alert-success">'. $signupthanks .'</h2></div><div id="returnVal" style="display:none;">true</div>';
      echo "</div>";
			//Send verification email
			//$m = new mailSender;
			//$m->sendMail($newemail, $newuser, $newid, 'Verify');
		}
		//Failure
		else{ mySqlErrors($response); }
	}

	else{//Validation error from empty form variables
		echo 'An error occurred on the form... try again';
	}
};
?>
</html>
