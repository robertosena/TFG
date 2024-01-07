<?php

require('db.php');

// VARIABLES
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username,password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: ./index.php");
?>