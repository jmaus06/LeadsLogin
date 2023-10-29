<?php
if ($leadName=="Joe"){
    echo "**TRAIL BOSS NOTES**";
    ?><br><br><font color="red"><?php
    $sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Notes!='' AND Notes IS NOT NULL";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)) { 
        $leadname = $row["Name"];
        $leadnotes = $row["Notes"];
        echo $leadname . "-----" . $leadnotes;
        ?><br><?php
    }
}
?>