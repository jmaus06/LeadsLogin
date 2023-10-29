<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Lead Schedule</title>
</head>
<style>
    body{ background-color: #F5F5F5; }
    h1{
        font-size: 3.5em;
        font-family: 'Arial', cursive;
    }
</style>
<?php

//Does lead exist in database already?
function alreadyExists($q){
    if (mysqli_num_rows($q) > 0)
    return true;
    else
    return false;
}
include 'credential.php';
$currentID = 0;

if (!$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName))
    die ("Failed to connect");
//GET Data from index form if lead is attending
$weekChosen = $_POST["weekNum"];
$leadName = $_POST["leads"];
$yesOrNo = $_POST["YesOrNo"];
$notes = $_POST["notes"];
$wk = intval($weekChosen); //for adding person
 setcookie('leadname',$leadName,time() + (86400 * 30));

//create all sql statements
include 'createSQL.php';

if ($yesOrNo == "Yes"){                      //Attending_____________________
        if (alreadyExists($result))
            mysqli_query($conn,$sqlUpdateY);        
        else
            mysqli_query($conn,$sqlInsertY);        
}
else if ($yesOrNo == "No"){                  //Not Attending_________________
        if (alreadyExists($result))
            mysqli_query($conn,$sqlUpdateN);        
        else
            mysqli_query($conn,$sqlInsertN);        
}
else{                                        //Change to NULL________________
       if (alreadyExists($result))
            mysqli_query($conn,$sqlUpdateNull);        
        else
            mysqli_query($conn,$sqlInsertNull);        
}
    //____________Back button______________
?> 


<form action="index.php" method="$POST" class="stickit">
    <input type="submit" name="weekNum" value="Back">
</form>
<h1>WEEK <?php echo $weekChosen; ?></h1>
<h2><u>Attending</u></h2><?php //_________Display___________Attending_________
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=1 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        include 'displayLead.php'; //DISPLAY LEAD
        ?></tr></h3>
</table>
<br><br>


 <h2><u><font color="red">NOT</font> attending</u></h2><?php //_____Display____Not__Attending_________
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=0 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        include 'displayLead.php'; //DISPLAY LEAD
        ?></tr></h3>
</table>
<br><br>


 <h2><u>Unsure</u></h2><?php //______________Display_________________________Unsure_________
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend IS NULL ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        include 'displayLead.php'; //DISPLAY LEAD
        ?></tr></h3>
</table>
<br><h2>
<?php
include 'bossNotes.php';
?>
</font>
</h2>
</html>

