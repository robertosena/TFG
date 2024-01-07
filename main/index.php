<?php require('header.php'); 

if (isset($_GET['code'])) {
    if ($_GET['code']=="1") {
        echo '<div class="alertdiv"><div class="alert alert-danger w-25" role="alert">You need to be logged in to do that!</div></div>';
    }
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<div class="content"><div>Scrims</div></div>
<div class="contentbuttons">

<a href="./publishscrim.php"><button type="button" class="btn btn-warning">Publish scrim</button></a>
<a href="./findscrims.php"><button type="button" class="btn btn-danger">Find scrims</button></a>
<a href="./createteam.php"><button type="button" class="btn btn-primary">Create team</button></a>
<a href="./myteams.php"><button type="button" class="btn btn-success">My teams</button></a>
</div>

<div id="scrimbox">
</div>
<link rel="stylesheet" href="./styles/api.css">
<script src="./js/api.js"></script>
<?php require('footer.html'); ?>