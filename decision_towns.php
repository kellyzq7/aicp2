<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 7 
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
    <title>Decision: Town 1 or Town 2</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="decision_towns.css">
  </head>
  <body>
    <h1>Decision: Town 1 or Town 2</h1>
      <div id = "container">
        <div id = "chasetown1">
            <img src = "img/romance.png" alt = "romance" />
            <a href = "dodge.php"><input type = "button" id = "ready" name = "ready" value = "Choose Town 1" /></a>
        </div>
        
        <div id = "chasetown2">
            <img src = "img/combat.png" alt = "combat" />
            <a href = "dodge1.php"><input type = "button" id = "ready" name = "ready" value = "Choose Town 2" /></a>
        </div>
      </div>
  </body>
<html>
