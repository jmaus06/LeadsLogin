<?php
session_start();
//check cookies, ensure authorized, greeting
include 'verify.php';
?>
<html>
    <head>
        <title>Lead Schedule</title>
    </head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    input[type=submit]{
        background: #4FB4B0;
        color: white;
        padding: 10px 25px;
        font-size: 16px;
        float: center; 
        font-family: 'Bebas Neue', cursive;
    }
    img {
        max-width:100%;
        height:auto;
    }
    select{ font-size:16px; }
    td{ padding: 8px; }
    body{ background-color: #F5F5F5; }
</style>
<?php

include 'credential.php';

$currentID = 0;

if (!$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName))
    die ("Failed to connect");
?>
<h1>Will you be attending?</h1>
<form name="pickWeek" method="POST" action="submitAttend.php">
    <h3>
    <label for "leads">Select yourself&nbsp&nbsp&nbsp&nbsp&nbsp</label>
    <select name="leads" id="leads">
        <option value="<?php echo $_COOKIE['leadname'];?>" selected><?php echo $leadtext;?></opton>
        <option value="Aaron">Aaron Carlisle</option>
        <option value="Alan">Alan Ramsey</option>
        <option value="Andrew">Andrew Onslow</option>
        <option value="Bailey">Andy Bailey</option>
        <option value="Ben">Ben Senff</option>
        <option value="Bogus">Chris Bogus</option>
        <option value="Chris">Chris Rahel</option>
        <option value="Zero">Christopher Rozman</option> 
        <option value="Collin">Collin Turner</option>
        <option value="Curtis">Curtis Hendrix</option>
        <option value="Joe">Joe Bomba</option>
        <option value="Joel">Joel Maus</option>
        <option value="Josh">Josh Burton</option>
        <option value="Matt">Matt Onslow</option> 
        <option value="Mike">Mike Medley</option> 
        <option value="Nate">Nate Hinderer</option>
        <option value="Nathan">Nathan Steele</option> 
        <option value="Neal">Neal Billig</option> 
        <option value="Tim">Tim May</option>     
        <option value="Travis">Travis Secrest</option>
    </select>
    </h3>
    <h3>
    Notes / Requests&nbsp&nbsp
    <input type="text" name="notes">
    </h3>
    <h3>
            <label for "YesOrNo">Will you be at pipestone on Friday?</label><br><br>
            <input type="radio" id="Unsure" name="YesOrNo" value="Unsure" checked>
                <label for="Unsure">Unsure</label>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" id="Yes" name="YesOrNo" value="Yes">
                <label for="Yes">Yes</label>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <input type="radio" id="No" name="YesOrNo" value="No">
                <label for="No">No</label>
            <br><br>
    </h3>
    <h3>Which week?</h3>
    <table><tr>
        <td><input type="submit" name="weekNum" value="0"></td><td>6/07</td><td></td><td></td><td></td>
        <td><input type="submit" name="weekNum" value="1"></td><td>6/14</td></tr><tr></tr><tr></tr><tr>
        <td><input type="submit" name="weekNum" value="2"></td><td>6/21</td><td></td><td></td><td></td>
        <td><input type="submit" name="weekNum" value="3"></td><td>6/28</td></tr><tr></tr><tr></tr><tr>
        <td><input type="submit" name="weekNum" value="4"></td><td>7/5</td><td></td><td></td><td></td>
        <td><input type="submit" name="weekNum" value="5"></td><td>7/12</td></tr><tr></tr><tr></tr><tr>
        <td><input type="submit" name="weekNum" value="6"></td><td>7/19</td><td></td><td></td><td></td>
        <td><input type="submit" name="weekNum" value="7"><td>7/26</td><td></td><td></td></tr>
    </table>
    <br>
</form>

</html>