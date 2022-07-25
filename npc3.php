<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 14 
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
    <h1>A child sobs in an alley.</h1>
    <p>Hey, are you alright?</p>
    <p>NPC: No... I'm scared.</p>
    <p>How come?</p>
    <p>NPC: It's [insert evil cowboy name here]. He's a cowboy that's been terrorizing our neighboring town, Vaquero Valley, for a long time.</p>
    <p>NPC: Rumor has it that he's expanding his territory to us, Bronco Basin. I don't want anyone here to get hurt.</p>
    <p>Don't worry. I'm sure everyone will be fine.</p>
    <p>NPC: I had a feeling you've never been around this region before. Obviously, I was right. So you don't understand.</p>
    <p>What don't I understand?</p>
    <p>NPC: [insert evil cowboy name here] is ruthless. Whoever defies him... well... ugh, I don't want to think about it.</p>
    <p>NPC: Hasn't anyone challenged him?</p>
    <p>NPC: Oh, no, lots of people have. As you can tell, no one succeeded.</p>
    <p>Then... I... um...</p>
    <p>Hopefully you'll be safe.</p>
    <p>NPC: <em>Hopefully</em>. That's no guarantee.</p>
    <p>NPC: I wish I didn't have to worry about my safety or my loved ones'. I want to feel happy again.</p>
    <p>NPC: There's no way that can happen, though. No one's gonna help.</p>
  </div>
    <h2>Walk to next person: <a href = "npc4.php">walk</a></h2>

  <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
</html>
  
