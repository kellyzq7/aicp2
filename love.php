<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 19
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
    <link rel="stylesheet" href="cssandjs/love.css">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  </head>

  <body>
    <h1>A beautiful love story</h1>
    <p>You and Texas Jack decide to partner up. What starts off as days of travelling and adventures together turn into years. Over time, you two begin to realize your feelings for one another. The rest of your time is lived out with Texas Jack as you both grow old, always at each others' side.</p>

  <a href="end.php"><input id='save' type = 'button' value = 'Create A New Character' /></a>
  <a href="logout.php"><input id='logOut' type = 'button' value = 'Save and Log Out' /></a>
  </body>
</html>
