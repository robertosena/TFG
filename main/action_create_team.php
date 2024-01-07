<?php
session_start();

require('db.php');

// VARIABLES
$teamname = $_POST['teamname'];
$iduser = $_SESSION["iduser"];
$playername1 = $_POST['playername1'];
$playername2 = $_POST['playername2'];
$playername3 = $_POST['playername3'];
$playername4 = $_POST['playername4'];
$playername5 = $_POST['playername5'];
$multiopgg = $_POST['multiopgg'];
$country = $_POST['country'];
$server = $_POST['server'];
$elo = $_POST['elo'];

$sql = "INSERT INTO teams (teamname,owner,playername1,playername2,playername3,playername4,playername5,multiopgg,country,server,elo)
 VALUES ('$teamname','$iduser','$playername1','$playername2','$playername3','$playername4','$playername5','$multiopgg','$country','$server','$elo')";

if ($conn->query($sql) === TRUE) {
  header("Location: ./myteams.php?success=1");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  header("Location: ./myteams.php?error=1");
}

$conn->close();
?>