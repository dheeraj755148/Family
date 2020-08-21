<?php


require_once "pdo.php";

session_start();
$salt = 'XyZzy12*_';



if ( isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass1']) && isset($_POST['name']) ) {

    if( strlen($_POST['email'])<1 || strlen($_POST['pass'])<1 ||strlen($_POST['name'])<1 || strlen($_POST['pass1'])<1){
        $_SESSION['error']= "All fields are required";
        header("Location: register.php");
        return;
    }



    else{
    $check = hash('md5', $salt.$_POST['pass']);

    $sql = "INSERT INTO users (name ,email, password) 
    VALUES (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $check,
        ));

        header("Location: index.php");
        return;

}}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <title>Register</title>
</head>
<body>

<div>

<form method="POST">

  <label for="email">Name</label><br>
  <input type="text" id="name" name="name" ><br>
  <label for="email">Email Id</label><br>
  <input type="email" id="email" name="email" ><br>
  <label for="lname">New Password</label><br>
  <input type="password" id="pass" name="pass" ><br><br>
  <label for="lname">Re-enter Password again</label><br>
  <input type="password" id="pass1" name="pass1" ><br><br>
  <input type="submit" id="submit" value="Submit"><br>
  <?php if (isset( $_SESSION['error'] )){
    echo('<p style="color: red;">'.$_SESSION['error']."</p>\n");
    unset($_SESSION['error']);
    }?>

    <input id="password" type="hidden"><br><br>
    <label style="color:black;">Already a member? <a href="index.php">Login</a></label>


</form> 
</div>

<script>
jQuery(function(){
        $("#submit").click(function(){
        $(".error").hide();
        var hasError = false;
        var passwordVal = $("#pass").val();
        var checkVal = $("#pass1").val();
        if (passwordVal == '') {
            $("#password").after('<span style="color:red;" class="error">Please enter a password.</span>');
            hasError = true;
        } else if (checkVal == '') {
            $("#password").after('<span style="color:red;" class="error">Please re-enter your password.</span>');
            hasError = true;
        } else if (passwordVal != checkVal ) {
            $("#password").after('<span style="color:red;" class="error">Passwords do not match.</span>');
            hasError = true;
        }
        if(hasError == true) {return false;}
    });
});

</script>



</body>
</html>