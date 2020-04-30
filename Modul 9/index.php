<?php
include_once('db-con.php');
$database = new database();
if(isset($_POST['register']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    
    if($database->register($fname,$lname,$email,$password,$phone))
    {
        header('location:view.php');
    }
}

?>
<html>
<head>
    <title>Tugas CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
</head>
<body>
<div class="card" style="width:25vw;margin:60px auto;">
  <!--Card content-->
  <!-- Default form register -->
<form class="text-center border border-light p-5" action="" method="post">

<p class="h4 mb-4">Sign up</p>

<div class="form-row mb-4">
    <div class="col">
        <!-- First name -->
        <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name" name="fname">
    </div>
    <div class="col">
        <!-- Last name -->
        <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name" name="lname">
    </div>
</div>

<!-- E-mail -->
<input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">

<!-- Password -->
<input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password"><br>

<!-- Phone number -->
<input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" name="phone">

<!-- Sign up button -->
<button class="btn btn-info my-4 btn-block" type="submit" name="register">Submit</button>

</form>
<!-- Default form register -->
</body>
</html>