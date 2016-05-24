<?php
    session_start();

    if(isset($_SESSION['username'])){
    session_start();
    session_destroy();
    }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Signup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="../css/main.css" rel="stylesheet" media="screen">
    </head>

    <body>
        <div class="container">

            <form class="form-signup" id="usersignup" name="usersignup" method="post" action="createuser.php">
                <h2 class="form-signup-heading">Register</h2>
                <input name="newuser" id="newuser" type="text" class="form-control" placeholder="Username" autofocus>
                 <br>
                <input name="email" id="email" type="text" class="form-control" placeholder="Email">
                <br>
                <input name="password1" id="password1" type="password" class="form-control" placeholder="Password">
                <input name="password2" id="password2" type="password" class="form-control" placeholder="Repeat Password">
                <select name="usertype[]" class = "form-control">
                    <option value="none">User Type</option>
                    <option value="1">Manager</option>
                    <option value="2">Doctor</option>
                    <option value="3">Patient</option>
                    <option value="4">Worker</option>
                </select>
                <br><br>
                <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>

                <div id="message"></div>
            </form>

        </div> <!-- /container -->  

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.js"></script>

        <script src="js/signup.js"></script>


        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script>

$( "#usersignup" ).validate({
    rules: {
    email: {
        email: true,
        required: true
    },
        password1: {
            required: true,
            minlength: 4
    },
        password2: {
            equalTo: "#password1"
        }
    }
});
</script>

    </body>
</html>
