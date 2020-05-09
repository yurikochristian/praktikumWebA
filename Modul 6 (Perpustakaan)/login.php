<?php 
include_once('db-con.php');
$database = new database();
session_start();
if(isset($_SESSION['is_login']))
{
    header('location:index.php');
}

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if($database->login($email,$password))
    {
      header('location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include "style.php";?>
    <link rel="stylesheet" href="css/kontak.css">
</head>

<body>
    <div id="main-content">
        <?php include 'header-sidebar.php';?>
        <div id="isi">
            <center>
                <h1>Login</h1>
                <form method="post" action="" name="login">
                    <input type="text" id="email" name="email" placeholder="E-Mail">
                    <input type="password" id="pass" name="password" placeholder="Password">
                    <button id="submit" type="submit" name="login" class="signupbtn">Sign In</button>
                </form>
                <p>Email dan password akun dapat dilihat pada readme repository github</p>
            </center>
        </div>
        <div id="clear"></div>
    </div>
</body>
</html>
