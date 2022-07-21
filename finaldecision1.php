<?php
    session_start();
    if(!isset($_SESSION["email"])){
        echo "header";
        header("Location: login.php");
    }
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
      $sth = $dbh->prepare("UPDATE user SET position=1 WHERE email=:login_email");
      $sth->bindValue(':login_email', $_SESSION["email"]);
      $sth->execute();
    }
    catch (PDOException $e) {
      echo "<p>Error: {$e->getMessage()}</p>";
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
