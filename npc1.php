<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 13
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
    <h1>A person approaches.</h1>
    <p>Kitty Wilkes: Why, hello there I'm Kitty Wilkes! What brings you around these parts?</p>
    <p>Just stumbled here after some combat. You know how it is.</p>
    <p>Kitty Wilkes: Oh, yeah. I get that.</p>
    <p>Though, I was wondering... why does this town seem abandoned?</p>
    <p>Kitty Wilkes: Well... us townfolk are all afraid, I suppose. Staying inside and such; avoiding danger.</p>
    <p>Why's that?</p>
    <p>Kitty Wilkes: You haven't heard? You're <em>definitely</em> not from around here.</p>
    <p>Kitty Wilkes: [Insert evil cowboy name here]'s been terrorizing Vaquero Valley for as long as I can remember. He controls everything that goes on around here.</p>
    <p>That's terrible! Why hasn't anyone tried to stop him?</p>
    <p>Kitty Wilkes: There's been a few that tried. Can't say it ended well for them.</p>
    <p>Kitty Wilkes: So now, we follow his orders and try to stay away from his gang. We don't need no trouble--that's why nobody's about to go and challenge him.</p>
    <p>Kitty Wilkes: But it would be nice...</p>
    <p>...it would be nice if what?</p>
    <p>Kitty Wilkes: ...if someone could take him down.</p>
    <p>Kitty Wilkes: Gosh, what am I saying? That's wishful thinking.</p>
    <p>Kitty Wilkes: Anyway, there ya have it. Welcome to Vaquero Valley!</p>
  </div>
    <h2>Walk to next person: <a href = "npc2.php">walk</a></h2>

  <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
</html>
