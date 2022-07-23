<?php
session_start();
require_once "kelly_credentials.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 22 
      WHERE id =:player_id");
    $sth->bindValue(':player_id', $_SESSION["player_id"]);
    $sth->execute();
    }
  catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";          
  }
}else {
    header('Location: login.php'); //if user isn't signed in send to login
}
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="combat.css" rel="stylesheet" type="text/css" />
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <script src = "combat.js"></script>
  </head>
  <body>
  <?php
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth2 = $dbh -> prepare("UPDATE player_character SET isActive = false
          WHERE id = :player_id");
        $sth2 -> bindvalue(":player_id", $_SESSION["player_id"]);
        $sth2 -> execute();
        
        echo "<h4>Aw Shucks! You failed this encounter. But that's ok you can always...";
        echo " " . " " . "<a href = 'class_select.php'><input type = 'button' value = 'create a new character' /></a></h4>";  

    } catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
    }


    ?>
  </body>
<html>

