
<?php


require_once "pdo.php";

session_start();

if (!isset($_SESSION['name'])){
    die('Access denied');
}
if ( isset($_POST['wow']) ) {
$position=3;
$value="/embed";
    $k=$_POST['wow'];
    $temp=explode("?",$k);
    
    $j=$temp[0];
    $j=explode("?",$j);
    $k=implode("",$j);
    $k=explode("playlist",$k);
    $res = array_slice($k, 0, 1, true) +
    array("my_key" => "embed/playlist") +
    array_slice($k, 1, count($k) - 1, true) ;
    $a=(implode($res));

 /*   $z=array_splice($i,$position,0,$value);
    print_r($z);*/




 $sql = "INSERT INTO iframe (user_id ,link) 
    VALUES (:user_id, :link)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':user_id' => $_SESSION['user_id'],
        ':link' => $a,  
        
        ));
        header("Location: music.php");
        return;

}

//print_r( $array[$i])['link'] ."<br />"
?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Music</title>
        <link rel="stylesheet" href="style/music1.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://use.fontawesome.com/2356bbae4d.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>

    <body>



        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><i class="fa fa-cogs" aria-hidden="true"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
              <a class="nav-item  nav-link" href="music.php">Home </a>
                <a class="nav-item active nav-link" href="music1.php">Music</a>
                <a class="nav-item nav-link" href="photos.php">Photos</a>
                <a class="nav-item nav-link" href="logout.php">Logout</a>
              </div>
            </div>
          </nav>
          <style>
            #iframe_fields{
                display:inline-block;
                 }
            #iframe{
                display:inline;
                top:0;
                }
            textarea{
                display:none;
                }
            </style>


    </body>
    <div class="container">
            <div class="row">
                <div class="col">

                <?php


$array=array();

$stmt = $pdo->query("SELECT link FROM iframe");
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
    $array[] = $row;


}

$k=htmlentities($rows['link']);

echo "<iframe src=\"".$k."\" width=\"100%\" height=\"1200\" 
    framespacing=0 frameborder=no border=0 scrolling=auto allow=encrypted-media></iframe>";

for ($i = 0; $i < count($array); $i++)  {
    $q=( $array[$i])['link'] ;

    echo "<iframe src=\"".$q."\" width=\"100%\" height=\"1200\" 
    framespacing=0 frameborder=no border=0 scrolling=auto allow=encrypted-media></iframe>";

   


}

            ?>
                
                
                </div>

                
            </div>

        </div>





    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>For new playlist addition, please share your playlist.</p>
            <form method="POST">
            <label for="email">Playlist Link of the spotify</label><br>
            <input type="text" id="iframe" name="wow" ><br>
            <input type="submit"  value="Submit"><br>
            </form>

   
        </div>
    </footer>

    

</html>