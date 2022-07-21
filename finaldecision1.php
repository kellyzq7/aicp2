<?php
session_start();
require_once "sql_config.php";

//update their the data base with the user's character name and position
if (isset($_SESSION["email"])) {//check if user is logged in
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE user SET `position`=18 WHERE email=:login_email");
    $sth->bindValue(':login_email', $_SESSION["email"]);
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
