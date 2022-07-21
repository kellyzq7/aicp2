<?php
session_start();
require_once "sql_config.php";

//update their the data base with the user's character name and position
if (isset($_SESSION["email"])) {//check if user is logged in
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE user SET `position`=3 WHERE email=:login_email");
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
    <title>Decision: Romance VS Combat</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="decision_romancevcombat.css">
  </head>
  <body>
    <h1>Decision: Romance or Combat</h1>
      <div id = "container">
        <div id = "romance">
            <img src = "img/romance.png" alt = "romance" />
            <a href = "romanceEncounter.php"><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
        </div>
        
        <div id = "combat">
            <img src = "img/combat.png" alt = "combat" />
            <a href = "combat1.php"><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
        </div>
      </div>
  </body>
<html>
