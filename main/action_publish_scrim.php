<?php
session_start();

require('db.php');

// VARIABLES
$team1 = $_POST['team1'];
$iduser = $_SESSION["iduser"];
$scrimdate = $_POST['scrimdate'];
$createdate = date('Y-m-d')."T".date('H:i');
$sql = "INSERT INTO scrims (team1, scrimdate, createdate)
 VALUES ('$team1', '$scrimdate', '$createdate')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: ./index.php");
?>