<?php
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true')
        header('Location: authenticate.php');
    $leadtext = "";
if (isset($_COOKIE['leadname'])){      
    if ($_COOKIE['leadname']!="ViewOnly"){
          ?><h1><?php echo "Hi,&nbsp" . $_COOKIE['leadname'];?></h1><?php 
        $leadtext = $_COOKIE['leadname'];
    }
   else     
       $leadtext = "Choose...";   
}
?>