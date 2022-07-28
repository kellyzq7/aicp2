<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 17 
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
    <link rel="stylesheet" href="cssandjs/finaldecision.css">
  </head>
  <body>
    <h1>Decision: Love Story or Boss Face Off</h1>
      <div id = "container">
        <div id = "love">
            <img src = "https://www.freepnglogos.com/uploads/heart-clipart-black-and-white/heart-outlines-download-best-heart-outlines-30.png" width = 50% alt = "romance" />
            <br>
            <a href = "love.php"><input type = "button" class = "buttons" name = "love" value = "Love story" /></a>
        </div>

        <div id = "boss">
            <img src = "https://cdn.pixabay.com/photo/2013/07/13/11/47/revolver-158673_640.png" width = 80% alt = "boss" />
            <br>
            <a href = "boss.php"><input type = "button" class = "buttons" name = "boss" value = "Boss face off" /></a>
        </div>
      </div>
    <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
<html>
