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
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  </head>
  
  <body>
    <h1>Welcome to NPC 4</h1>
    <p>a hard decision awaits you <a href = "finaldecision2.php">here</a></p>
  
  
  </body>
</html>
  
  