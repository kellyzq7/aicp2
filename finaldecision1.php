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
    <title>Decision: FINAL PATH</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="finaldecision1.css">
  </head>
  <body>
    <h1>Decision: Love Story or Boss Face Off</h1>
      <div id = "container">
        <div id = "love">
            <img src = "img/romance.png" alt = "romance" />
            <a href = "love.php"><input type = "button" id = "love" name = "love" value = "Send my love to my new loooover" /></a>
        </div>
        
        <div id = "boss">
            <img src = "img/combat.png" alt = "combat" />
            <a href = "boss.php"><input type = "button" id = "boss" name = "boss" value = "Boss face off" /></a>
        </div>
      </div>
  </body>
<html>
