<?php
session_start();
require_once "sql_config.php";

//check that user is signed in
if (isset($_SESSION["email"]) && isset($_SESSION["player_id"])) {
  try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $sth = $dbh->prepare("UPDATE player_character SET `position`= 9
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
    <link href="cssandjs/combat.css" rel="stylesheet" type="text/css" />
    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <script src = "cssandjs/combat.js"></script>
  </head>
  <body>
  <?php
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

        $sth2 = $dbh -> prepare("SELECT combat FROM player_character
          WHERE id = :player_id");
        $sth2 -> bindvalue(":player_id", $_SESSION["player_id"]);
        $sth2 -> execute();
        $combatPoints = $sth2 -> fetch();

        if($combatPoints == 2){
          echo "<input id = 'big' type = 'button' value = 'FIGHT!' />";
          echo "<h2 class = 'hide'>Congrats! You won the combat! As a reward, you get 2 combat points!</h2>";
          echo "<a class = 'hide' href = 'town2.php'>Onward!</a>";

        } else {
          echo "<input id = 'small' type = 'button' value = 'FIGHT!' />";
          echo "<h2 class = 'hide'>Congrats! You won the combat! As a reward, you get 2 combat points!</h2>";
          echo "<a class = 'hide' href = 'town2'.php'>Onward!</a>";
        }
        
        $new_celerity = $player_row["celerity"] + rand(0,2);
        $new_combat = $player_row["combat"] + rand(0,2);
        $new_charisma = $player_row["charisma"] + rand(0,2);
        
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


    } catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
    }


    ?>
  </body>
<html>
