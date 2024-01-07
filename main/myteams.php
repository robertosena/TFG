<?php 

//includes
require('header.php'); //default header load
require('db.php'); //database connection creator
if (empty($_SESSION['iduser'])) {
  header("Location: ./index.php?code=1");
}
//functions
function showTeams($conn){
  $iduser = $_SESSION["iduser"];
  $sql = "SELECT t.idteam, t.teamname, t.playername1, t.playername2, t.playername3, t.playername4, t.playername5, t.multiopgg, c.namecountry, s.nameserver, e.elo FROM teams t, countries c, elo e, servers s WHERE owner='$iduser' AND t.country=c.idcountry AND t.elo=e.idelo AND t.server=s.idserver ORDER BY idteam DESC";
  $result = $conn->query($sql);
  if (isset($_GET['success'])) {
    echo '<div class="alertdiv"><div class="alert alert-success w-25" role="alert">
    Your team has been created!
  </div></div>';
  }
  if (isset($_GET['delete'])) {
    echo '<div class="alertdiv"><div class="alert alert-warning w-25" role="alert">
    Your team has been deleted!
  </div></div>';
  }

  if (isset($_GET['error'])) {
    echo '<div class="alertdiv"><div class="alert alert-danger w-25" role="alert">
    You cannot create a team if you are not logged in!
  </div></div>';
  }

  if ($result->num_rows > 0) {
    echo '<h1 class="display-4 header-my-teams">My <b>teams</b></h1>';
    echo '<div class="team-container">';
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo '<div>';
          echo "<p class='titlebox'>". $row["teamname"]."</p>";
          echo "<p>PLAYER 1: ". $row["playername1"]."</p>";
          echo "<p>PLAYER 2: ". $row["playername2"]."</p>";
          echo "<p>PLAYER 3: ". $row["playername3"]."</p>";
          echo "<p>PLAYER 4: ". $row["playername4"]."</p>";
          echo "<p>PLAYER 5: ". $row["playername5"]."</p>";
          echo "<p><a href='".$row["multiopgg"]."'>MULTIOPGG</a></p>";
          echo "<p>COUNTRY: ". $row["namecountry"]."</p>";
          echo "<p>SERVER: ". $row["nameserver"]."</p>";
          echo "<p>ELO: ". $row["elo"]."</p>";
          echo ' <a href="./modifyteam.php?idteam='.$row["idteam"].'"><button type="button" class="btn btn-warning">Modify</button></a>';
          echo ' <a href="./action_delete_team.php?idteam='.$row["idteam"].'"><button type="button" class="btn btn-danger">Delete team</button></a>';
          echo '</div>';
      }
      echo '</div>';

  } else {
      echo '<div class="alertdiv"><div class="alert alert-danger w-25" role="alert">
      You have no teams!
    </div></div>';
  }
  $conn->close();
}

//code
showTeams($conn);

?>
<?php require('footer.html'); ?>
