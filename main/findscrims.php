<?php 

//includes
require('header.php'); //default header load
require('db.php'); //database connection creator

//code
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];
} else {
  $pageno = 1;
}

$no_of_records_per_page = 5;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM scrims";
$result = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

//create the filter
$sql = "SELECT * FROM table "; 
 
    if (empty($_POST['filterby'])) {
      $_POST['filterby']="1";
    }
    if ($_POST['filterby']=="1") {
      $sql = "SELECT s.idscrim, s.team1 AS teamcode1, s.team2 AS teamcode2, t1.teamname AS team1, t2.teamname AS team2, scrimdate, e.elo, t1.multiopgg, ser.nameserver
    FROM scrims s LEFT JOIN teams t1 ON s.team1 = t1.idteam
    LEFT JOIN teams t2 ON s.team2 = t2.idteam
    LEFT JOIN elo e ON e.idelo=t1.elo
    LEFT JOIN servers ser ON ser.idserver=t1.server ORDER BY s.idscrim DESC LIMIT $offset, $no_of_records_per_page";
    }elseif($_POST['filterby']=="2"){
      $sql = "SELECT s.idscrim,s.team1 AS teamcode1, s.team2 AS teamcode2, t1.teamname AS team1, t2.teamname AS team2, scrimdate, e.elo, t1.multiopgg, ser.nameserver
    FROM scrims s LEFT JOIN teams t1 ON s.team1 = t1.idteam
    LEFT JOIN teams t2 ON s.team2 = t2.idteam
    LEFT JOIN elo e ON e.idelo=t1.elo
    LEFT JOIN servers ser ON ser.idserver=t1.server ORDER BY e.elo";
    }elseif($_POST['filterby']=="3"){
      $sql = "SELECT s.idscrim,s.team1 AS teamcode1, s.team2 AS teamcode2, t1.teamname AS team1, t2.teamname AS team2, scrimdate, e.elo, t1.multiopgg, ser.nameserver
    FROM scrims s LEFT JOIN teams t1 ON s.team1 = t1.idteam
    LEFT JOIN teams t2 ON s.team2 = t2.idteam
    LEFT JOIN elo e ON e.idelo=t1.elo
    LEFT JOIN servers ser ON ser.idserver=t1.server ORDER BY scrimdate";
    }
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '<h1 class="display-4 header-my-teams">Find <b>scrims</b></h1>';
      echo '<form class="w-25" action="./findscrims.php" method="post">';
      echo '<div class="find-scrim-filter">';
      echo '<div>
      <div class="form-group">
    <label for="filterby">Filter by</label>
    ';
    if ($_POST['filterby']=="1") {
      echo '<select class="form-control" id="filterby" name="filterby">
      <option value="1" selected>New scrims</option>
      <option value="2">Elo</option>
      <option value="3">Date</option>
    </select>
  </div>
  </div><button type="submit" class="btn btn-primary">Filter</button>';
    }elseif($_POST['filterby']=="2"){
      echo '<select class="form-control" id="filterby" name="filterby">
      <option value="1">New scrims</option>
      <option value="2" selected>Elo</option>
      <option value="3">Date</option>
    </select>
  </div>
  </div><button type="submit" class="btn btn-primary">Filter</button>';
    }elseif($_POST['filterby']=="3"){
      echo '<select class="form-control" id="filterby" name="filterby">
      <option value="1">New scrims</option>
      <option value="2">Elo</option>
      <option value="3" selected >Date</option>
    </select>
  </div>
  </div><button type="submit" class="btn btn-primary">Filter</button>';
    }
      echo '
      </div></form>';
      echo '<div class="team-container-find">';
        while($row = $result->fetch_assoc()) {
            echo '<div>';
            echo "<p class='titlebox'>SCRIM ". $row["idscrim"]."</p>";
            echo "<a href='./team.php?idteam=". $row["teamcode1"]."'><p>TEAM 1: ". $row["team1"]."</p></a>";
            
            echo "<p>DATE 🗓️ ". $row["scrimdate"]."</p>";
            echo "<p>ELO: ". $row["elo"]."</p>";
            echo "<p>SERVER: ". $row["nameserver"]."</p>";
            echo "<p><a href='".$row["multiopgg"]."'>MULTIOPGG</a></p>";
            if ($row['team2']=="") {
              echo '<td><a href="./joinscrim.php?idscrim='.$row['idscrim'].'"><button type="button" class="btn btn-success">Join scrim</button></a></td>';
            }else{
              echo "<a href='./team.php?idteam=". $row["teamcode2"]."'><p>TEAM 2: ". $row["team2"]."</p></a>";
            }
            echo '</div>';
        }
        echo '</div>';
  
    } else {
        echo "0 results";
    }
    $conn->close();


    ?>

<ul class="pagination">
    <li><a href="?pageno=1"><button type="button" class="btn btn-primary">First</button></a></li>
    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><button type="button" class="btn btn-primary">Prev</button></a>
    </li>
    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><button type="button" class="btn btn-primary">Next</button></a>
    </li>
    <li><a href="?pageno=<?php echo $total_pages; ?>"><button type="button" class="btn btn-primary">Last</button></a></li>
</ul>

<?php require('footer.html'); ?>
