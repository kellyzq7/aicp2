<?php
session_start();
require_once "sql_config.php";

//update their the data base with the user's character name and position
if (isset($_SESSION["email"])) {//check if user is logged in
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE user SET `position`=8 WHERE email=:login_email");
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
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  </head>
  
  <body>
    <h1>Yay you paid attention, so you don't have to do the dodge encounter (dodge.php or dodge1.php)</h1>
    <p>you get to go straight to the <a href = "town1.php">town</a></p>
  
  
  </body>
</html>
  
  
