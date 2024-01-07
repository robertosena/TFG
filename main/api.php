<?php
//requires
require('db.php');

//functions
function API($conn){
    $posts_arr['data'] = array();
    $sql = "SELECT s.idscrim, s.team1, s.scrimdate, t.teamname, e.elo, t.multiopgg, ser.nameserver FROM scrims s, teams t, elo e, servers ser WHERE s.team1=t.idteam AND t.elo=e.idelo AND s.team2 IS NULL AND t.server=ser.idserver ORDER BY idscrim DESC LIMIT 5;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $post_item = array(
                'idscrim' => $row["idscrim"],
                'team1' => $row["team1"],
                'scrimdate' => $row["scrimdate"],
                'teamname' => $row["teamname"],
                'elo' => $row["elo"],
                'multiopgg' => $row["multiopgg"],
                'server' => $row["nameserver"]
            );
            array_push($posts_arr['data'], $post_item);
        }
        $myJSON = json_encode($posts_arr);
        echo $myJSON;
    } else {
        echo "0 results";
    }
    $conn->close();
}

//code
API($conn);

?>