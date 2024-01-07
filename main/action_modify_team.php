<?php
session_start();

require('db.php');

// VARIABLES
$idteam = $_POST['idteam'];
$iduser = $_SESSION["iduser"];
$teamname = $_POST['teamname'];
$playername1 = $_POST['playername1'];
$playername2 = $_POST['playername2'];
$playername3 = $_POST['playername3'];
$playername4 = $_POST['playername4'];
$playername5 = $_POST['playername5'];
$multiopgg = $_POST['multiopgg'];




$sql = "UPDATE teams SET teamname = '$teamname', playername1 = '$playername1',
playername2 = '$playername2', playername3 = '$playername3', 
playername4 = '$playername4', playername5 = '$playername5', 
multiopgg = '$multiopgg'
WHERE idteam=$idteam AND owner=$iduser;";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  
  $conn->close();
  header("Location: ./myteams.php");


?>