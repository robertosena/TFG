<?php
session_start();

require('db.php');
// VARIABLES
$idscrim = $_POST['idscrim'];
$iduser = $_SESSION["username"];
$team2 = $_POST['team2'];

$sql = "UPDATE scrims SET team2 = $team2 WHERE idscrim=$idscrim;";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: ./index.php");

?>