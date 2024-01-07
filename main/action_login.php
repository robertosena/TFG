<?php
session_start();

require('db.php');

// VARIABLES
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT password, iduser FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if (password_verify($password, $row["password"])) {
      // BGG
      


      $_SESSION["username"] =  $username;
      $_SESSION["iduser"] =  $row["iduser"];

    } else {
      echo 'Invalid password.';
  }
      }
} else {
  echo "0 results";
}
$conn->close();
 header("Location: ./index.php");

?>