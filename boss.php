<?php
session_start();
require_once "sql_config.php";

// check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 20
    WHERE id =:player_id");
    $sth->bindValue(':player_id', $_SESSION["player_id"]);
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
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Cul Cavboj</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link href="cssandjs/boss.css" rel="stylesheet" type="text/css" />
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <script src = "cssandjs/boss.js"></script>
    <style>

    body {
      margin:0;
      background-color:#F38A46;
      cursor: url('img/scope_cursor.png'), auto;
      background-image: url('img/desert_bg.png');
      background-repeat:no-repeat;
      background-size: cover;
      background-position:center center;
    }

    </style>
  </head>
  <body>

    <iframe src="audio/silence.mp3" allow="autoplay" id="audio"></iframe>

    <audio autoplay>
      <source src="audio/main_theme.mp3" type="audio/mp3">
    </audio>

  <?php
    try {
        //query for the player's combat stats
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $sth2 = $dbh -> prepare("SELECT * FROM player_character WHERE id = :player_id");
        $sth2 -> bindvalue(":player_id", $_SESSION["player_id"]);
        $sth2 -> execute();
        $player = $sth2 -> fetch();

    if ($player["class"] == "crasher") {      //if player is crasher class echo easy encounter
          echo "<div class='hidden encounter_check easy'></div>"; //echo a div that the JS can check for what difficulty of encounter make
        }
    else if ($player["combat"] >= 6) {        //else if player has high enough combat points echo easy encounter anyway
          echo "<div class='hidden encounter_check easy'></div>"; //echo a div that the JS can check for what difficulty of encounter make
        }
    else if ($player["combat"] >= 4) {        //else if player has a little bit of  combat points echo medium encounter
          echo "<div class='hidden encounter_check medium'></div>"; //echo a div that the JS can check for what difficulty of encounter make
        }
    else { //else echo hardest encounter
          echo "<div class='hidden encounter_check hard'></div>"; //echo a div that the JS can check for what difficulty of encounter make
    }
  }catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
    }
    ?>

      <h1 id="warning_text">You're final showdown will begin shortly.
        This is it. The final boss encounter. Keep shooting at the boss to win. Good luck partner.</h1>
      <h1 id="timer" class="hidden"></h1>

      <?php

      //add random number to buff stats by
      $new_celerity = $player["celerity"] + rand(0,2);
      $new_combat = $player["combat"] + rand(0,2);
      $new_charisma = $player["charisma"] + rand(0,2);

      //update the data base with the stat increase
      try {
          $sth_stat = $dbh -> prepare("UPDATE player_character SET celerity = :new_celerity, combat = :new_combat, charisma = :new_charisma WHERE id=:player_id");
          $sth_stat->bindValue(':player_id', $_SESSION["player_id"]);
          $sth_stat->bindValue(':new_celerity', $new_celerity);
          $sth_stat->bindValue(':new_combat', $new_combat);
          $sth_stat->bindValue(':new_charisma', $new_charisma);
          $sth_stat -> execute();
          $new_stats = $sth_stat -> fetch();

          //echo new stats to player, which will be shown after encounter is complete, if encounter is failed the character will be killed/set to inactive.
          echo "<p class='hidden stats'> After completing that encounter you have improved your skills, you now have <b>{$new_celerity}</b> celerity points, <b>{$new_combat}</b> combat points, and <b>{$new_charisma}</b> charisma points. </p>";
          echo "<p class='hidden onward'> You proudly stride across the Wild West, respected by all, living the dream life! <a id='new' href='end.php'>Begin a New Cowboy</a></p>";
        }

     catch (PDOException $e) {
          echo "<p>Error: {$e->getMessage()}</p>";
      }

      ?>

  <img src="img/boss.png" class = "hidden" id="boss" alt="The Boss" />

  </body>
</html>
