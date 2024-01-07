<?php 

require('header.php');
require('db.php');



// functions
function detectifislogged(){
  if (empty($_SESSION['iduser'])) {
    header("Location: ./index.php?code=1");
  }
}

function myteamsshow($conn){
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
}

detectifislogged();

?>
<h1 class="display-4 header-my-teams">Publish a <b>scrim</b></h1>
<div class="d-flex justify-content-center">
<form class="w-25" action="./action_publish_scrim.php" method="post">
  <div class="form-group">
    <label for="team1">Select your team</label>
    <select class="form-control" id="team1" name="team1">
      <?php 
      myteamsshow($conn);
      ?>
    </select>
  </div>
  <div class="form-group">
  <label for="meeting-time">Choose a time for your appointment:</label>
  <br>
    <input type="datetime-local" id="scrimdate"
       name="scrimdate" value="2023-05-01T00:00"
       min="2023-05-01T00:00">
    </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Accept terms of service</label>
  </div>
  <button type="submit" class="btn btn-dark">Publish scrim</button>
</form>
</div>
<?php require('footer.html'); ?>
