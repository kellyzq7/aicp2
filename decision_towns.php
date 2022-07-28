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
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="cssandjs/towns.css">
  </head>
  <body>
    <h1>Decision: Go to Vaquero Valley or Bronco Basin</h1>
      <div id = "container">
        <div id = "town1">
            <img src = "img/vaquerovalley.png" width = 103% alt = "romance" />
            <a href = "dodge1.php"><input type = "button" id = "button1" name = "ready" value = "Vaquero Valley" /></a>
        </div>

        <div id = "town2">
            <img src = "img/broncobasin.png" width = 76% alt = "combat" />
            <a href = "combat.php"><input type = "button" id = "button2" name = "ready" value = "Bronco Basin" /></a>
        </div>
      </div>
    <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
<html>
