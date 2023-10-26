<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<link rel="stylesheet" href="style.css">
</head>
<style>
body{
    background-color: #F5F5F5;
}
</style>
<?php

$dbServername = "$$$$$$$";
$dbUsername = "######";
$dbPassword = "******";
$dbName = "%%%%%%%";

$currentID = 0;

if (!$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName))
    die ("Failed to connect");
//GET Data from index form if lead is attending
$YN=0;
$weekChosen = $_POST["weekNum"];
$leadName = $_POST["leads"];
$yesOrNo = $_POST["YesOrNo"];
$wk = intval($weekChosen); //for adding person

 setcookie('leadname',$leadName,time() + (86400 * 30));

$sql           =  "SELECT * FROM Leads2024 WHERE Name= '$leadName' AND Week='$weekChosen'";
$result        =  mysqli_query($conn, $sql);
$sqlUpdateY    = "UPDATE Leads2024 SET Attend=1 WHERE (Name='$leadName' AND Week= '$weekChosen')";
$sqlInsertY    = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, 1)";
$sqlUpdateN    = "UPDATE Leads2024 SET Attend=0 WHERE (Name='$leadName' AND Week= '$weekChosen')";
$sqlInsertN    = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, 0)";
$sqlUpdateNull = "UPDATE Leads2024 SET Attend=NULL WHERE (Name='$leadName' AND Week= '$weekChosen')";
$sqlInsertNull = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, NULL)";


if ($yesOrNo == "Yes"){                      //Attending_____________________
        if (mysqli_num_rows($result) > 0)
            mysqli_query($conn,$sqlUpdateY);        
        else
            mysqli_query($conn,$sqlInsertY);        
}
else if ($yesOrNo == "No"){                  //Not Attending_________________
        if (mysqli_num_rows($result) > 0)
            mysqli_query($conn,$sqlUpdateN);        
        else
            mysqli_query($conn,$sqlInsertN);        
}
else{                                        //Change to NULL________________
        if (mysqli_num_rows($result) > 0)
            mysqli_query($conn,$sqlUpdateNull);        
        else
            mysqli_query($conn,$sqlInsertNull);        
}
    //____________Back button______________
?> 


<form action="index.php" method="$POST" class="stickit">
    <input type="submit" name="weekNum" value="Back">
</form>


<h2><u>Week <?php echo $weekChosen; ?> attending</u></h2><?php //_________Display___________Attending_________
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=1 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { 
                if ($row["Name"] != "ViewOnly"){           
                        $showName = $row["Name"]; 
                        ?><td><?php echo $showName;?><td><?php  
                    if ($colPosition%3 == 0){
                            ?></tr><tr><?php
                        }
                    $colPosition++;                    
                }
            }     
        }?></tr></h3>
</table>
<br><br>



 <h2><u>Week <?php echo $weekChosen; ?> <font color="red">NOT</font> attending</u></h2><?php //_____Display____Not__Attending_________
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=0 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { 
                if ($row["Name"] != "ViewOnly"){           
                        $showName = $row["Name"]; 
                        ?><td><?php echo $showName;?><td><?php  
                        if ($colPosition%3 == 0){
                            ?></tr><tr><?php
                            }                           
                    $colPosition++;                    
                }
            }     
        }?></tr></h3>
</table>
<br><br>



 <h2><u>Week <?php echo $weekChosen; ?> unsure</u></h2><?php //______________Display_________________________Unsure_________
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend IS NULL ORDER BY Name";
$result = mysqli_query($conn, $sql);

$colPosition = 1;
?><table>
        <h3><tr><?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) { 
                if ($row["Name"] != "ViewOnly"){           
                        $showName = $row["Name"]; 
                        ?><td><?php echo $showName;?><td><?php  
                        if ($colPosition%3 == 0){
                            ?></tr><tr><?php
                        }
                    $colPosition++;                    
                }
            }     
        }?></tr></h3>
</table>
</html>
<?php
?>
