<?php
session_start();
require_once "sql_config.php";

//update their the data base with the user's character stats and class
if (isset($_SESSION["email"])) {//check if user is logged in
try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh->prepare("UPDATE user SET `class` = 'charmer', `combat`=0, `charisma`= 2, `celerity`= 0 WHERE email=:login_email");
  $sth->bindValue(':login_email', $_SESSION["email"]);
  $sth->execute();
  }
catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
          }
else {
  header('Location: login.php'); //if user isn't signed in send to login
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link href="home.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script></script>
<style>

</style>
</head>
<body>
<form action="intro.php" method="POST">
<h1 id="char_name_header">Name Your Character: </h1>
<input type="text" required name="char_name" id="char_name">

<input type="submit" value="Create Character" />
</form>
</body>
</html>
