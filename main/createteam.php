<?php 

//requires
require('header.php');

//functions
function detectifislogged(){
  if (empty($_SESSION['iduser'])) {
    header("Location: ./index.php?code=1");
  }
}

//code
detectifislogged();

?>
<h1 class="display-4 header-my-teams">Create a <b>team</b></h1>
<div class="d-flex justify-content-center">
<form class="w-25" action="./action_create_team.php" method="post">
  <div class="form-group">
    <label for="teamname">Team name</label>
    <input type="text" class="form-control" id="teamname" name="teamname" placeholder="Enter teamname">
  </div>
  <div class="form-group">
    <label for="elo">Elo</label>
    <select class="form-control" id="elo" name="elo">
      <option value="1">Iron</option>
      <option value="2">Bronze</option>
      <option value="3">Silver</option>
      <option value="4">Gold</option>
      <option value="5">Platinum</option>
      <option value="6">Diamond</option>
      <option value="7">Master</option>
      <option value="8">Grand Master</option>
      <option value="9">Challenger</option>
    </select>
  </div>
  <div class="form-group">
    <label for="playername1">Player 1 nickname</label>
    <input type="text" class="form-control" id="playername1" name="playername1" placeholder="Enter player 1 IGN (In Game Name)">
  </div>
  <div class="form-group">
    <label for="playername2">Player 2 nickname</label>
    <input type="text" class="form-control" id="playername2" name="playername2" placeholder="Enter player 2 IGN (In Game Name)">
  </div>
  <div class="form-group">
    <label for="playername3">Player 3 nickname</label>
    <input type="text" class="form-control" id="playername3" name="playername3" placeholder="Enter player 3 IGN (In Game Name)">
  </div>
  <div class="form-group">
    <label for="playername4">Player 4 nickname</label>
    <input type="text" class="form-control" id="playername4" name="playername4" placeholder="Enter player 4 IGN (In Game Name)">
  </div>
  <div class="form-group">
    <label for="playername5">Player 5 nickname</label>
    <input type="text" class="form-control" id="playername5" name="playername5" placeholder="Enter player 5 IGN (In Game Name)">
  </div>
  <div class="form-group">
    <label for="multiopgg">Multiopgg</label>
    <input type="text" class="form-control" id="multiopgg" name="multiopgg" placeholder="Enter multiopgg of all players">
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <select class="form-control" id="country" name="country">
      <option value="1">Spain</option>
    </select>
  </div>
  <div class="form-group">
    <label for="server">Server</label>
    <select class="form-control" id="server" name="server">
      <option value="1">EUW</option>
      <option value="2">EUNE</option>
    </select>
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Accept terms of service</label>
  </div>
  <button type="submit" class="btn btn-dark">Create team</button>
</form>
</div>
<?php require('footer.html'); ?>
