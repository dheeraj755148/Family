<?php

require_once "pdo.php";

session_start();
$salt = 'XyZzy12*_';

if ( isset($_POST['email']) && isset($_POST['pass']) ) {
  $_SESSION['name']=$_POST['email'];


    $check = hash('md5', $salt.$_POST['pass']);
    $stmt = $pdo->prepare('SELECT user_id, name FROM users
        WHERE email = :em AND password = :pw');
    $stmt->execute(array( ':em' => $_POST['email'], ':pw' => $check));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ( $row !== false ) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['user_id'] = $row['user_id'];
        // Redirect the browser to index.php
        header("Location: music.php");
        return;


        } else {
            $_SESSION["error"] = "Incorrect password";
            header('Location: index.php');
            error_log("Login fail ".$_POST['email']." $check");
            return;

        }
}








?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&display=swap" rel="stylesheet">

    <title>Login</title>
</head>
<body>

<div>

<form method="POST">
  <label for="email">Email Id</label><br>
  <input type="email" id="email" name="email" ><br>
  <label for="lname">Password</label><br>
  <input type="password" id="pass" name="pass" ><br><br>
  <input type="submit" value="Submit" id="save">
  <p>Not a user ? <a href="register.php">Register</a></p> <br>
  <?php if (isset( $_SESSION['error'] )){
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.$_SESSION['error']."</p>\n");
    unset($_SESSION['error']);
    }?>
</form> 
</div>
</body>
</html>