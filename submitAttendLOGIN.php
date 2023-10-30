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
<?php//                           Does lead exist in database already?
function alreadyExists($q){
    if (mysqli_num_rows($q) > 0)
    return true;
    else
    return false;
}
include 'credential.php';
//                          **********   UPDATE DATABASE   **********
include 'createSQL.php';
include 'runQueries.php';
?> 
<form action="index.php" method="$POST" class="stickit">
    <input type="submit" name="weekNum" value="Back">
</form>
<h1>WEEK <?php echo $weekChosen; ?></h1>
<h2><u>Attending</u></h2><?php //                                                       *** DISPLAY ATTENDANCE ***
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=1 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        include 'displayLead.php'; 
        ?></tr></h3>
</table>
<br><br>
 <h2><u><font color="red">NOT</font> attending</u></h2><?php //                                 ** NOT ATTEND **
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend=0 ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        include 'displayLead.php';
        ?></tr></h3>
</table>
<br><br>
 <h2><u>Unsure</u></h2><?php //                                                                ** UNSURE **
$sql = "SELECT * FROM Leads2024 WHERE Week='$weekChosen' AND Attend IS NULL ORDER BY Name";
$result = mysqli_query($conn, $sql);
$colPosition = 1;
?><table>
        <h3><tr><?php
        include 'displayLead.php';
        ?></tr></h3>
</table>
<br><h2>
<?php
include 'bossNotes.php';//              *** NOTES ***
?>
</font>
</h2>
</html>

