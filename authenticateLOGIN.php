<?php

$username = null;
$password = null;
if (!isset($_COOKIE['leadname'])){
    setcookie('leadname',"ViewOnly",time() + (86400 * 30));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(!empty($_POST["password"])) {
        $password = $_POST["password"];
        
        if($password == '********') {
            setcookie('*******','21',time() + (86400 * 30));
            session_start();
            $_SESSION["authenticated"] = 'true';
            header('Location: index.php');
        }
        else {
            header('Location: authenticate.php');
        }
        
    } else if (isset($_COOKIE['********'])) {    //cookie set
    
             session_start();
            $_SESSION["authenticated"] = 'true';
            header('Location: index.php');
    }
     else {
        header('Location: authenticate.php');
    }
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="page">
      <header id="banner">          
    </header>
       <section id="content">
        <form id="login" method="post">
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" required>                    
            <br />
            <input type="submit" value="Login">
        </form>
    </section>      
</div>
</body>
</html>
<?php } ?>