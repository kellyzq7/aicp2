<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 16 
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
    <h1>A person whistles.</h1>
    <p>NPC: Yoo-hoo! Over here!</p>
    <p>NPC: The name's [insert cool nickname]. You're not from town, are you?</p>
    <p>I'm not. You're not the first person to tell me that, either. How does everyone know?</p>
    <p>NPC: You'd be preparing a safe place to hide if you lived here, not wandering around.</p>
    <p>Oh. What about you, then? Why are you outside?</p>
    <p>NPC: I also don't live here. I just help people.</p>
    <p>Help people how? As far as I know, there's two towns of people being commanded by one cowboy.</p>
    <p>NPC: You're right, I'm not trying to stop [insert evil cowboy name here]. What I do is on a smaller scale.</p>
    <p>NPC: If someone's in dire need of help, I get them outta danger.</p>
    <p>That still doesn't make sense. Why aren't you helping anyone in the towns?</p>
    <p>NPC: I said dire. [insert evil cowboy name here] leaves people alone as long as they do as he says.</p>
    <p>And you're okay with that? People being dictated?</p>
    <p>NPC: I didn't say that! Just, don't you think people being hunted down takes precedent over people being controlled? Their lives are risk.</p>
    <p>So are the peoples' lives in the towns.</p>
    <p>NPC: Immediate risk, then.</p>
    <p>NPC: And how about you? The reason I called you here in the first place was to ask whether you were in danger or not. People don't come this far out without a reason.</p>
    <p>Yeah, I am. There's a gang of cowboys chasing me as we speak.</p>
    <p>NPC: Well, why don't you allow me to help? I can promise you there'll be no more hunters. Just freedom.</p>
  </div>
    <h2>A hard decision awaits you <a href = "finaldecision2.php">here.</a></h2>

    <a href="logout.php"><input type = 'button' value = 'Save and Log Out' /></a>
  </body>
</html>

  
