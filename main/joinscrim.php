<?php 

require('header.php');
require('db.php');

if (empty($_SESSION['iduser'])) {
  header("Location: ./index.php?code=1");
}

$idscrim = $_GET['idscrim'];
$sql = "SELECT * FROM scrims WHERE idscrim = $idscrim";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<h1 class="display-4 header-my-teams">Join a <b>scrim</b></h1>
<div class="alertdiv"><div class="alert alert-warning w-25" role="alert">
    Your are joining scrim <?php echo $row['idscrim']; ?> against team <?php echo $row['team1']; ?>
  </div></div>
<div class="d-flex justify-content-center">
<form class="w-25" action="./action_join_scrim.php" method="post">
  <div class="form-group">
    <label for="team2">Select your team</label>
    <select class="form-control" id="team2" name="team2">
      <?php 
      $iduser = $_SESSION["iduser"];
      $sql = "SELECT idteam, teamname FROM teams WHERE owner='$iduser' ORDER BY idteam DESC";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo '<option value="'.$row["idteam"].'">'.$row["teamname"].'</option>';
          }
      } else {
          echo "0 results";
      }
      $conn->close();
      ?>
    </select>
  </div>
  <?php echo '<input type="text" class="form-control" id="idscrim" name="idscrim" value="'.$_GET['idscrim'].'" hidden>'; ?>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Accept terms of service</label>
  </div>
  <button type="submit" class="btn btn-success">Join scrim</button>
</form>
</div>
<?php require('footer.html'); ?>
