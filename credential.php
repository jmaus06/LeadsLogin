<?php
$dbServername = "***";
$dbUsername = "***";
$dbPassword = "***";
$dbName = "***";

$currentID = 0;

if (!$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName))
    die ("Failed to connect");
?>