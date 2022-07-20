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
  session_start();
  require_once "sql_config.php";

  try {
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
  $sth_password = $dbh->prepare("SELECT * FROM user WHERE email=:login_email");//find pass_hash where id matches login id
  $sth_password->bindValue(':login_email', htmlspecialchars($_POST["user_login"]));
  $sth_password->execute();
  $hash = $sth_password->fetch();

  if (password_verify(htmlspecialchars($_POST["pass_login"]), $hash['password'])) { //verify password agaisnt hash
      echo "<h1> Succesfully Logged in as " . htmlspecialchars($_POST["user_login"]) . "</h2>";
   }
  else { //if password doesn't match send to sign in
    header('Location: login.php');
  }
  }
  catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }

  //Fetch Character location, and echo link redirecting to that page
  try {
  $sth_location = $dbh->prepare("SELECT * FROM user WHERE email=:login_email");
  $sth_location->bindValue(':login_email', htmlspecialchars($_POST["user_login"]));
  $sth_location->execute();
  $user = $sth_location->fetch();

  if($user["position"] == 0) {
    echo "<a class='redirect' href='class_select.php'> Create New Character </a>";
  }
  else if($user["position"] == 1) {
    echo "<a class='redirect' href='intro.php'> Return to Game </a>";
  }
  else if($user["position"] == 2) {
    echo "<a class='redirect' href='ambush.php'> Return to Game </a>";
  }
  else if($user["position"] == 3) {
    echo "<a class='redirect' href='decision1.php'> Return to Game </a>";
  }







  }
  catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
  ?>
</body>
</html>
