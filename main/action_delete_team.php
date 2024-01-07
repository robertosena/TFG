<?php
session_start();

require('db.php');

// VARIABLES
$idteam = $_GET['idteam'];
$iduser = $_SESSION["iduser"];

$sql = "SELECT * FROM teams WHERE owner='$iduser' AND idteam='$idteam'";
$result = $conn->query($sql);
if ($result->num_rows >= 1) {
  $sql = "DELETE FROM scrims WHERE team1=$idteam OR team2=$idteam";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $sql = "DELETE FROM teams WHERE idteam=$idteam AND owner=$iduser";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
  header("Location: ./myteams.php?delete=1");
}else{
  echo "ERROR";
}


?>