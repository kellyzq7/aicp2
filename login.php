<?php
session_start();
require_once "sql_config.php";

if (isset($_POST["email"]) && isset($_POST["password"]) == true) { //if coming from register, update user table to create account
  try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth = $dbh->prepare("INSERT INTO user ( email, password, position)
  VALUES (:reg_email, :reg_password, '0');");
  $sth->bindValue(':reg_email', htmlspecialchars($_POST["email"]));
  $sth->bindValue(':reg_password', password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT));
  $sth->execute();
  }
  catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script></script>
<style>

</style>
</head>
<body>
  <?php
  ?>
<h1> Account Login </h1>
<form action="redirect.php" method="POST">
<label for="user_login"> Email: </label>
<input type="email" name="user_login" id="user_login">

<label for="pass_login"> Password: </label>
<input type="password" name="pass_login" id="pass_login">

<input type="submit" value="Login">
</form>
<a href="register.php">Don't have an account, register one here</a>
</body>
</html>
