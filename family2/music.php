<?php


require_once "pdo.php";

session_start();

if (!isset($_SESSION['name'])){
    die('Access denied');
}




?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Family</title>
        <link rel="stylesheet" href="style/music.css">
        <script src="https://use.fontawesome.com/2356bbae4d.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Family</h1>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><i class="fa fa-cogs" aria-hidden="true"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-item active nav-link" href="music.php">Home </a>
                <a class="nav-item nav-link" href="music1.php">Music</a>
                <a class="nav-item nav-link" href="photos.php">Photos</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
              </div>
            </div>
          </nav>
          <div class="container">
              <div class="row">
                  <div id="qw">
                      <br><p>The people who are in this program are listed below.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Anagha</li>
                            <li class="list-group-item">Abhishek</li>
                            <li class="list-group-item">Arman</li>
                            <li class="list-group-item">Anisha</li>
                            <li class="list-group-item">Dheeraj</li>
                            <li class="list-group-item">Laveena</li>
                            <li class="list-group-item">Mansi</li>
                            <li class="list-group-item">Sagar</li>
                            <li class="list-group-item">Sejal</li>
                            <li class="list-group-item">Sampada</li>
                            <li class="list-group-item">Soanl</li>
                            <li class="list-group-item">Soni</li>
                            <li class="list-group-item">Utsav</li>
                          </ul> 
                  </div>
              </div>
          </div>
    </body>
</html>