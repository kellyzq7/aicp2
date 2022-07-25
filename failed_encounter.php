<?php
session_start();
require_once "sql_config.php";
$_SESSION["characer_status"] = "inactive";//set a variable that can be checked in class_select.php to see if a new character needs to be created
//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 22, `isActive` = false
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
  </head>
  <body>


  <h4>Aw Shucks! You failed this encounter. But that's ok you can always...<a href = 'class_select.php'><input type = 'button' value = 'create a new character' /></a></h4>



  </body>
<html>
