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

if (isset($_SESSION["email"])) {//check if user is logged in
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
}
else {
    header('Location: login.php'); //if user isn't signed in send to login
}


  //Fetch Character location, and echo link redirecting to that page
  try {
  $_SESSION["email"] = htmlspecialchars($_POST["user_login"]);
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
    echo "<a class='redirect' href='combat.php'> Return to Game </a>";
}
  else if($user["position"] == 3) {
    echo "<a class='redirect' href='decision_romancevcombat.php'> Return to Gam catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }e </a>";
  }
  else if($user["position"] == 4) {
    echo "<a class='redirect' href='romanceEncounter.php.'> Return to Game </a>";
  }
  else if($user["position"] == 5) {
    echo "<a class='redirect' href='combat1.php'> Return to Game </a>";
  }
  else if($user["position"] == 6) {
    echo "<a class='redirect' href='decision_towns1.php'> Return to Game </a>";
  }
  else if($user["position"] == 7) {
    echo "<a class='redirect' href='decision_towns.php'> Return to Game </a>";
  }
  else if($user["position"] == 8) {
    echo "<a class='redirect' href='yay.php'> Return to Game </a>";
  }
  else if($user["position"] == 9) {
    echo "<a class='redirect' href='dodge1.php'> Return to Game </a>";
  }
  else if($user["position"] == 10) {
    echo "<a class='redirect' href='dodge.php'> Return to Game </a>";
  }
  else if($user["position"] == 11) {
    echo "<a class='redirect' href='dodge1.php'> Return to Game </a>";
  }
  else if($user["position"] == 12) {
    echo "<a class='redirect' href='town1.php'> Return to Game </a>";
  }
  else if($user["position"] == 13) {
    echo "<a class='redirect' href='town2.php'> Return to Game </a>";
}
  else if($user["position"] == 14) {decision1
    echo "<a class='redirect' href='npc1.php'> Return to Game </a>";
  }
  else if($user["position"] == 15) {
    echo "<a class='redirect' href=npc3.php'> Return to Game </a>";
} catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
  else if($user["position"] == 16) {
    echo "<a class='redirect' href='npc2.php'> Return to Game </a>";
  }
  else if($user["position"] == 17) {
    echo "<a class='redirect' href='npc4.php'> Return to Game </a>";
  }
  else if($user["position"] == 18) {
    echo "<a class='redirect' href='finaldecision1.php'> Return to Game </a>";
  }
  else if($user["position"] == 19) {
    echo "<a class='redirect' href='finaldecision2.php'> Return to Game </a>";
  }
  else if($user["position"] == 20) {
    echo "<a class='redirect' href='love.php'> Return to Game </a>";
  }
  else if($user["position"] == 21) {
    echo "<a class='redirect' href='boss.php'> Return to Game </a>";
  }
  else if($user["position"] == 22) {
    echo "<a class='redirect' href='freedom.php'> Return to Game </a>";
  }
  else { //if invalid location reset location and send to login
      try {
      $sth_location = $dbh->prepare("UPDATE user SET position = 1 WHERE email=:login_email");
      $sth_location->bindValue(':login_email', htmlspecialchars($_POST["user_login"]));
      $sth_location->execute();
      $user = $sth_location->fetch();
      header('Location: login.php');
  }
  catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
  }
}
  catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
            }
  ?>
</body>
</html>
