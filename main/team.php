<?php 

//includes
require('header.php'); //default header load
require('db.php'); //database connection creator

//functions
function teamPublic($conn){
  $idteam = $_GET['idteam'];
  $sql = "SELECT t.*, e.elo, c.namecountry, s.nameserver FROM teams t, elo e, countries c, servers s WHERE t.idteam=$idteam AND e.idelo=t.elo AND c.idcountry=t.country AND s.idserver=t.server";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo '<h1 class="display-4 header-my-teams">Team <b>checker</b></h1>';
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
          echo '</div>';
      }
      echo '</div>';

  } else {
      echo '<div class="alertdiv"><div class="alert alert-danger w-25" role="alert">
      This team doesnt exists!
    </div></div>';
  }
  $conn->close();
}

//code
teamPublic($conn);

?>
<?php require('footer.html'); ?>
