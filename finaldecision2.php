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
    <link rel="stylesheet" href="finaldecision2.css">
  </head>
  <body>
    <h1>Decision: Boss Face Off or Freedom</h1>
      <div id = "container">
        <div id = "boss">
            <img src = "img/romance.png" alt = "romance" />
            <a href = "boss.php"><input type = "button" id = "boss" name = "boss" value = "Boss face off" /></a>
        </div>
        
        <div id = "freedom">
            <img src = "img/combat.png" alt = "combat" />
            <a href = "freedom.php"><input type = "button" id = "freedom" name = "freedom" value = "FREEEDOM" /></a>
        </div>
      </div>
  </body>
<html>
