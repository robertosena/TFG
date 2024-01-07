<?php 
session_start();

function changeHeaderIfHasCookie(){
  if(isset($_SESSION["username"])){
    $cookie = $_SESSION["username"];
    echo "Connected as <b>$cookie</b>";
    echo ' <a href="./action_logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
  }
  else{
      echo '<a href="./login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
      <a href="./register.php"><button type="button" class="btn btn-warning">Sign-up</button></a>';
  }
}

?>

<!-- Styles and boostrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="./styles/style.css">

<!--  -->
<header class="p-2 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="./index.php" class="test">Scrims</a></li>
        </ul>


        <div class="text-end">
          <?php changeHeaderIfHasCookie(); ?>
        </div>
      </div>
    </div>
  </header>