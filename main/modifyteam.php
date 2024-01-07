<?php 

require('header.php');
require('db.php');


$idteam = $_GET['idteam'];

$sql = "SELECT * FROM teams WHERE idteam=$idteam";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<div class="d-flex justify-content-center">
<form class="w-25" action="./action_modify_team.php" method="post">
  <div class="form-group">
    <label for="teamname">Team name</label>
    <input type="text" class="form-control" id="teamname" name="teamname" value="<?php echo $row["teamname"] ?>">
  </div>
  <div class="form-group">
    <label for="playername1">Player 1 nickname</label>
    <input type="text" class="form-control" id="playername1" name="playername1" value="<?php echo $row["playername1"] ?>">
  </div>
  <div class="form-group">
    <label for="playername2">Player 2 nickname</label>
    <input type="text" class="form-control" id="playername2" name="playername2" value="<?php echo $row["playername2"] ?>">
  </div>
  <div class="form-group">
    <label for="playername3">Player 3 nickname</label>
    <input type="text" class="form-control" id="playername3" name="playername3" value="<?php echo $row["playername3"] ?>">
  </div>
  <div class="form-group">
    <label for="playername4">Player 4 nickname</label>
    <input type="text" class="form-control" id="playername4" name="playername4" value="<?php echo $row["playername4"] ?>">
  </div>
  <div class="form-group">
    <label for="playername5">Player 5 nickname</label>
    <input type="text" class="form-control" id="playername5" name="playername5" value="<?php echo $row["playername5"] ?>">
  </div>
  <div class="form-group">
    <label for="multiopgg">Multiopgg</label>
    <input type="text" class="form-control" id="multiopgg" name="multiopgg" value="<?php echo $row["multiopgg"] ?>">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <input type="text" class="form-control" id="idteam" name="idteam" value="<?php echo $idteam ?>" hidden>
    <label class="form-check-label" for="exampleCheck1">Accept terms of service</label>
  </div>
  <button type="submit" class="btn btn-warning">Modify team</button>
</form>
</div>
<?php require('footer.html'); ?>
