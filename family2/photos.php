

<?php


require_once "pdo.php";

session_start();

if (!isset($_SESSION['name'])){
    die('Access denied');
}


if ( isset($_POST['wow']) ) {




    $sql = "INSERT INTO photo (user_id ,link) 
    VALUES (:user_id, :link)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':user_id' => $_SESSION['user_id'],
        ':link' => $_POST['wow']  
        
        ));
        header("Location: music.php");
        return;

}


            

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Photos</title>
        <link rel="stylesheet" href="style/photos.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://use.fontawesome.com/2356bbae4d.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   
    </head>
    <body>

    <style>

body{
background: lightcoral;    height: 100vh;
    width: 100%;

}
h1{
    font-family: cursive;
    color: black;
    
}
img{
    width: 300px;
    height: 300px;
}

img{
    margin: 0 auto;
    display: inline-block;
    border:solid black 3px;
    float: left;
    margin: 10px;
    transition: transform .5s;
}

img:hover{
    transform: scale(1.1);
    }

    


@media screen and (max-width:600px){
    img{
        margin: 0 auto;
        margin-top: 10px;float: none;display: block;
    }
    body{
        height: 100%;
    }
}




    </style>


        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><i class="fa fa-cogs" aria-hidden="true"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
              <a class="nav-item  nav-link" href="music.php">Home </a>
                <a class="nav-item nav-link" href="music1.php">Music</a>
                <a class="nav-item active nav-link" href="photos.php">Photos</a>
                <a class="nav-item   nav-link" href="logout.php">Logout</a>
              </div>
            </div>
          </nav>
        <h1>Family Photos</h1>
        <div class="container">
            <div class="row">
                <div class="col">
                <?php
                
                
$array=array();

$stmt = $pdo->query("SELECT link FROM photo");
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
    $array[] = $row;


}

$k=htmlentities($rows['link']);

echo "<img src=\"".$k."\" width=\"100%\" height=\"1200\" ></img>";

for ($i = 0; $i < count($array); $i++)  {
    $q=( $array[$i])['link'] ;

    echo "<img src=\"".$q."\" width=\"100%\" height=\"1200\" ></img>";
;


}



                ?>

                </div>

            </div>
        </div>

        <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>For new Photo addition, please share the link from google photos.</p>
            <form method="POST">
            <label for="email" >Google photos link</label><br>
            <input type="text" id="iframe" name="wow" ><br>
            <input type="submit"  value="Submit"><br>
            </form>

   
        </div>
    </footer>

        

    </body>
</html>
