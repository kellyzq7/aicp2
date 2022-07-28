<?php
session_start();
require_once "sql_config.php";

// check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 4
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cul Cavboj</title>
    <link rel="stylesheet" href="cssandjs/romanceEncounter.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="cssandjs/romanceEncounter.js"></script>
</head>
<body>
  <p id="first">James Jessie: Well, lookie here. Tell me, traveller, why I shouldn't end yer life right here, right now.</p>
  <br>

  <h2 id="options"> Select a dialouge option: </h2>

  <p class="option" id='first_option'>I'm too young to die! Please spare me!</p>



  <p class='response hidden'>James Jessie: Nice try. That's not gonna convince me.</p>
  <h1 class='response died hidden'>You died!</h1>
<?php

try{
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

  $sth2 = $dbh->prepare("SELECT * FROM player_character WHERE id =:player_id");
  $sth2->bindValue(':player_id', $_SESSION["player_id"]);
  $sth2->execute();
  $player = $sth2->fetch();

if ($player["charisma"] >= 2){      //if charisma meets a threshold, echo another dialogue option.
    echo "<p class='option' id='second_option'>I'm too beautiful to be killed! Don't ya agree?</p>";
    echo "<p class='response1 hidden'>James Jessie: True, but I don't get anything from keeping you alive.</p>";
    echo "<p class='response1 hidden'>You: Not exactly. We can become partners and I could help you out.</p>";
    echo "<p class='hidden response1'>James Jessie: No deal Bronco!.</p>";
    echo "<h1 class='response1 died hidden'>You died!</h1>";
          }

if ($player["charisma"] >= 4 || $player["class"]=="charmer") {      //if charisma meets a threshold or class is charmer, echo another dialogue option.
    echo "<p class='option' id='third_option'>If you killed me now, then how would I take you out for dinner tonight?</p>";
    echo "<p class='response2 hidden'>James Jessie: Hmm... good point. Where should we eat, though?</p>";
    echo "<p class='response2 hidden'>You: Let's look around.</p>";
    echo "<p class='response2 hidden'><a href = 'decision_towns1.php'> Move on </a></p>";
      }
if ($player["charisma"] >= 6 || $player["class"]=="charmer") {      //if charisma meets a threshold or class is charmer, echo another dialogue option.
    echo "<p class='option' id='fourth_option'>Ain't no rodeo clown that can keep us from getting together bronco.</p>";
    echo "<p class='response3 hidden'>James Jessie: Fair enough.</p>";
    echo "<p class='response3 hidden'><a href = 'decision_towns1.php'> Move on </a></p>";
      }

$new_celerity = $player["celerity"] + rand(0,2);
$new_combat = $player["combat"] + rand(0,2);
$new_charisma = $player["charisma"] + rand(0,2);

//update the data base with the stat increase
$sth_stat = $dbh -> prepare("UPDATE player_character SET celerity = :new_celerity, combat = :new_combat, charisma = :new_charisma WHERE id=:player_id");
$sth_stat->bindValue(':player_id', $_SESSION["player_id"]);
$sth_stat->bindValue(':new_celerity', $new_celerity);
$sth_stat->bindValue(':new_combat', $new_combat);
$sth_stat->bindValue(':new_charisma', $new_charisma);
$sth_stat -> execute();
$new_stats = $sth_stat -> fetch();

//echo new stats to player, which will be shown after encounter is complete, if encounter is failed the character will be killed/set to inactive.
echo "<p class='hidden stats'> After completing that encounter you have improved your skills, you now have " . $new_celerity  . " celerity points, " . $new_combat  . " combat points, and " . $new_charisma  . " charisma points. </p>";
}
catch (PDOException $error){
  echo "<p>Can't connect to database</p>";
  echo "<p>" . $error->getMessage() . "</p>";
}

 ?>
</body>
</html>
