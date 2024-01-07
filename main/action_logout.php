<?php
session_start();
$_SESSION["username"] = "";
$_SESSION["iduser"] = "";
session_destroy();
header("Location: ./index.php");
?>