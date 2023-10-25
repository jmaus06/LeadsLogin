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

if (!$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName)){
die ("Failed to connect");
}
$YN=0;
$weekChosen = $_POST["weekNum"];
$leadName = $_POST["leads"];
$yesOrNo = $_POST["YesOrNo"];
$wk = intval($weekChosen); //for adding person

 setcookie('leadname',$leadName,time() + (86400 * 30));

$sql = "SELECT * FROM Leads2024 WHERE Name= '$leadName' AND Week='$weekChosen'";
$result = mysqli_query($conn, $sql);

if ($yesOrNo=="Yes"){
    $YN = 1;
    if (mysqli_num_rows($result) > 0){
   $sql = "UPDATE Leads2024 SET Attend='$YN' WHERE (Name='$leadName' AND Week= '$weekChosen')";
   mysqli_query($conn,$sql);
}
else{
   $sql = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, $YN)";
   mysqli_query($conn,$sql);
}
}
else if($yesOrNo=="No"){
    $YN=0;
    if (mysqli_num_rows($result) > 0){
   $sql = "UPDATE Leads2024 SET Attend='$YN' WHERE (Name='$leadName' AND Week= '$weekChosen')";
   mysqli_query($conn,$sql);
}
else{
   $sql = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, $YN)";
   mysqli_query($conn,$sql);
}
}
else{
    if (mysqli_num_rows($result) > 0){
   $sql = "UPDATE Leads2024 SET Attend=NULL WHERE (Name='$leadName' AND Week= '$weekChosen')";
   mysqli_query($conn,$sql);
}
else{
   $sql = "INSERT INTO Leads2024 (Name, Week, Attend) VALUES ('$leadName', $wk, NULL)";
   mysqli_query($conn,$sql);
}
}



?> 
<form action="index.php" method="$POST" class="stickit">
<input type="submit" name="weekNum" value="Back">
</form>
<h2><u>Week <?php echo $weekChosen; ?> attending</u></h2><?php

$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=1 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$c = 1;
?><table><h3><tr><?php
if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) { 
        if ($row["Name"] != "ViewOnly"){           
                $showName = $row["Name"]; 
                ?><td><?php         
                echo $showName;
                ?><td><?php  
               if ($c%3 == 0){
                    ?></tr><tr><?php
                }
           $c++;                    
        }
     }     
}?></tr></h3></table>
<br><br>
 <h2><u>Week <?php echo $weekChosen; ?> <font color="red">NOT</font> attending</u></h2><?php
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=0 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$c = 1;
?><table><h3><tr><?php
if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) { 
        if ($row["Name"] != "ViewOnly"){           
                $showName = $row["Name"]; 
                ?><td><?php         
                echo $showName;
                ?><td><?php  
                if ($c%3 == 0){
                    ?></tr><tr><?php
                }
                
        $c++;                    
        }
     }     
}?></tr></h3></table>

<br><br>
 <h2><u>Week <?php echo $weekChosen; ?> unsure</u></h2><?php
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend IS NULL ORDER BY Name";
$result = mysqli_query($conn, $sql);

$showName = "test";

$c = 1;
?><table><h3><tr><?php
if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) { 
        if ($row["Name"] != "ViewOnly"){           
                $showName = $row["Name"]; 
                ?><td><?php         
                echo $showName;
                ?><td><?php  
              if ($c%3 == 0){
                    ?></tr><tr><?php
                }               
            $c++;                    
        }
     }     
}?></tr></h3></table>
</html>
<?php
?>
