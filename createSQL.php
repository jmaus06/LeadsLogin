<?php
$sql           =  "SELECT * FROM Leads2024 WHERE Name= '$leadName' AND Week='$weekChosen'";
$result        =  mysqli_query($conn, $sql);
$sqlUpdateY    = "UPDATE Leads2024 SET Attend=1, Notes='$notes' WHERE (Name='$leadName' AND Week= '$weekChosen')";
$sqlInsertY    = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, 1)";
$sqlUpdateN    = "UPDATE Leads2024 SET Attend=0, Notes='$notes' WHERE (Name='$leadName' AND Week= '$weekChosen')";
$sqlInsertN    = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, 0)";
$sqlUpdateNull = "UPDATE Leads2024 SET Attend=NULL, Notes='$notes' WHERE (Name='$leadName' AND Week= '$weekChosen')";
$sqlInsertNull = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, NULL)";
?>