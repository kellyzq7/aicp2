<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 5 
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
          $email = $_SESSION["email"];

          $sth2 = $dbh -> prepare("SELECT combat FROM user WHERE id =:player_id");
          $sth->bindValue(':player_id', $_SESSION["player_id"]);
          $sth2 -> execute();
          $combatPoints = $sth2 -> fetch();

          if($combatPoints == 2){
            echo "<input id = 'big' type = 'button' value = 'FIGHT!' />";
            echo "<h2 class = 'hide'>Congrats! You won the combat! As a reward, you get 2 combat points!</h2>";
            echo "<a class = 'hide' href = 'decision_towns.php'>Onward!</a>";

          } else {
            echo "<input id = 'small' type = 'button' value = 'FIGHT!' />";
            echo "<h2 class = 'hide'>Congrats! You won the combat! As a reward, you get 2 combat points!</h2>";
            echo "<a class = 'hide' href = 'decision_towns.php'>Onward!</a>";
          }


      } catch (PDOException $e) {
          echo "<p>Error: {$e->getMessage()}</p>";
      }

    ?>
  </body>
<html>
