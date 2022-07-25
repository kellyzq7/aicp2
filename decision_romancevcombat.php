<?php
session_start();
require_once "sql_config.php";

check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 3 
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
    <title>Decision: Romance VS Combat</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" href="cssandjs/decision_romancevcombat.css">
  </head>
  <body>
    <h1>Decision: Romance or Combat</h1>
      <div id = "container">
        <div id = "romance">
            <h2>Romance</h2>
            <p></p>
            <a href = "romanceEncounter.php"><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
        </div>
        
        <div id = "combat">
          <h2>Combat</h2>
          <p></p>
          <a href = "combat1.php"><input type = "button" id = "ready" name = "ready" value = "Choose" /></a>
        </div>
      </div>
    <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
<html>
