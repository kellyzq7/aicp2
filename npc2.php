<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 15
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
    <link rel="stylesheet" href="cssandjs/npc.css">
  </head>

  <body>
    <div id='convo'>
    <h1>Another citizen lies ahead.</h1>
    <p>Texas Jack: Howdy. You're a brave soul, showing your face in public. That, or you're foolish.</p>
    <p>I could say the same about you. How come you're not holed up inside?</p>
    <p>Texas Jack: I'm not afraid of that hotshot cowboy [insert evil cowboy name here]. Plus, this isn't my town.</p>
    <p>Where do you live, then?</p>
    <p>Texas Jack: Nowhere. I'm what most would call... a free spirit.</p>
    <p>Well, you're not the only "free spirit" here.</p>
    <p>Texas Jack: Oh, really? What're you doing in a place like this?</p>
    <p>Escaping some hooligans.</p>
    <p>Texas Jack: Same here.</p>
    <p>Texas Jack: Say, why don't we skip town and travel together? Better to fight with another person instead of fighting alone.</p>
    <p>True, but that also means I'd have double the enemies, since there are guys on your tail too.</p>
    <p>Texas Jack: You hafta admit, though, everything's better with a partner.</p>
    <p>You got me there.</p>
  </div>
    <h2>A hard decision awaits you <a href = "finaldecision1.php">here.</a></h2>

  <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
</html>
