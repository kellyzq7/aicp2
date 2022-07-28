<!doctype html>
<html lang="en">
<head>
<title>Cul Cavboj</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="cssandjs/redirect.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script></script>
<style>
.archived {
  border: 4px solid black;
  padding:6px;
  margin:20px;
}
</style>
</head>
<body>
  <?php
  session_start();
  require_once "sql_config.php";

  try {
    
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);


  if (isset($_POST["user_login"]) && isset($_POST["pass_login"])) {//checks that user came from login
    $sth_password = $dbh->prepare("SELECT * FROM user WHERE email=:login_email");//find pass_hash where id matches login id
    $sth_password->bindValue(':login_email', htmlspecialchars($_POST["user_login"]));
    $sth_password->execute();
    $login_row = $sth_password->fetch();

    if (password_verify(htmlspecialchars($_POST["pass_login"]), $login_row['password'])) { //verify password agaisnt hash
        echo "<h1 id='logged_in'> Succesfully Logged in as " . htmlspecialchars($_POST["user_login"]) . "</h2>";
        //Fetch Character location, and echo link redirecting to that page
        $_SESSION["email"] = htmlspecialchars($_POST["user_login"]); //store email in session to allow for login checks later on
        $user_id = $login_row["id"]; //store the user id of the user to find its associated character(s)
        //then get charcter where user_id = user id, and isActive = true
        $sth_location = $dbh->prepare("SELECT *, player_character.id AS player_id  FROM player_character
        JOIN user
        ON user.id = player_character.user_id
        WHERE
        user.id =:log_user_id
        AND
        player_character.isActive = TRUE;");
        $sth_location->bindValue(':log_user_id', $user_id);
        $sth_location->execute();
        $player = $sth_location->fetch(); //player now has the row of the charcter associated with the logged in account, which is currently the user's active character
        $_SESSION["player_id"] = $player["player_id"];//store the player charcter id in session for easy access to update its position on later pages.
        $_SESSION["user_id"] = $user_id; //store user id in session
     }
    else { //if password doesn't match send to sign in
      header('Location: login.php');
    }
  }
  //else if came from admin and all session vars already set
  elseif($_SESSION["is_admin"] == "true"){
    echo "<h1> Succesfully Logged in as " . $_SESSION["email"] . "</h2>";
    //then get charcter where user_id = user id, and isActive = true
    $sth = $dbh->prepare("SELECT user.isAdmin, player_character.position
      FROM player_character JOIN user on user.id = player_character.user_id
      WHERE player_character.id = :player_id AND player_character.isActive = TRUE");
    $sth->bindValue(':player_id', $_SESSION["player_id"]);
    $sth->execute();
    $player = $sth->fetch(); //select player that admin edited
  }
  else {
      header('Location: login.php'); //if user isn't signed in send to login
  }

}
catch (PDOException $e) {
echo "<p>Error: {$e->getMessage()}</p>";
}


try {
  //if user is admin, display link to admin page
  if($login_row["isAdmin"] == 1 || $player["isAdmin"] == 1){
    echo "<a class='redirect' href='admin_page.php'> Admin Only Page </a><br /><br />";
  }

  //based on the player's position echo a link to take them back to where they left off
  if($player["position"] == 0) {
    echo "<a class='redirect' href='class_select.php'> Create New Character </a><br /><br />";
  }
  else if($player["position"] == 1) {
    echo "<a class='redirect' href='intro.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 2) {
    echo "<a class='redirect' href='dodge.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 3) {
    echo "<a class='redirect' href='decision_romancevcombat.php'> Return to Game catch </a><br /><br />";
  }
  else if($player["position"] == 4) {
    echo "<a class='redirect' href='romanceEncounter.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 5) {
    echo "<a class='redirect' href='combat1.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 6) {
    echo "<a class='redirect' href='decision_towns1.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 7) {
    echo "<a class='redirect' href='decision_towns.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 8) {
    echo "<a class='redirect' href='yay.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 9) {
    echo "<a class='redirect' href='combat.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 10) {
    echo "<a class='redirect' href='dodge1.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 11) {
    echo "<a class='redirect' href='town1.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 12) {
    echo "<a class='redirect' href='town2.php'> Return to Game </a><br /><br />";
}
  else if($player["position"] == 13) {
    echo "<a class='redirect' href='npc1.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 14) {
    echo "<a class='redirect' href=npc3.php'> Return to Game </a><br /><br />";
}
  else if($player["position"] == 15) {
    echo "<a class='redirect' href='npc2.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 16) {
    echo "<a class='redirect' href='npc4.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 17) {
    echo "<a class='redirect' href='finaldecision1.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 18) {
    echo "<a class='redirect' href='finaldecision2.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 19) {
    echo "<a class='redirect' href='love.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 20) {
    echo "<a class='redirect' href='boss.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 21) {
    echo "<a class='redirect' href='freedom.php'> Return to Game </a><br /><br />";
  }
  else if($player["position"] == 22) {
    echo "<a class='redirect' href='failed_encounter.php'>You died, return to game</a><br /><br />";
  }
  else if($player["position"] == 23) {
    echo "<a class='redirect' href='end.php'>You completed the game, return to the end</a><br /><br />";
  }
  else { //if invalid location reset location and send to login
      $sth_invalid = $dbh->prepare("UPDATE player_character SET `position` = 0 WHERE `user_id`=:log_user_id AND `isActive` = true");
      $sth_invalid->bindValue(':log_user_id', $user_id);
      $sth_invalid ->execute();
      header('Location: login.php');
  }

  //query for inactive characters associated with the user, and display their stats
  $sth_archive= $dbh->prepare("SELECT * FROM player_character
  JOIN user
  ON user.id = player_character.user_id
  WHERE
  user.id =:log_user_id
  AND
  player_character.isActive = FALSE;");
  $sth_archive->bindValue(':log_user_id', $user_id);
  $sth_archive->execute();
  $archived_characters = $sth_archive->fetchall(); //create array of arrays with all inactive characters belonging to user
?>

<div id="previous">
<h3>Previous Characters: </h3>

<div id="inactive">
<?php
  foreach ($archived_characters as $character) { //loop through array of arrays and display stats of each archived character
    echo '<div class="archive">
    <h4><b id = "charName">' . $character["character_name"] . '</b></h4>
    <ul>
    <li>Class: <p>' . $character["class"] .'</p></li>
    <li>Celerity Points: <b>' . $character["celerity"] .'</b></li>
    <li>Charisma Points: <b>' . $character["charisma"] .'</b></li>
    <li>Combat Points: <b>' . $character["combat"] .'</b></li>
    </ul>
    </div>';
  }

}
  catch (PDOException $e) {
  echo "<p>Error: {$e->getMessage()}</p>";
}
  ?>
</div>
</div>

  <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
</body>
</html>
