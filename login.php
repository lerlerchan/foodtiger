<?php
include 'connection.php'; 
session_start();
if($_POST)
	{
 $u=$_POST['Email']; //get username key in from the login form
    $p=$_POST['Password']; //get the password value from login form
    $p = password_verify($password,$p);
    $sql="select * from user where Email='$u' and Password='$p'"; //verify the
    $result = $conn->query($sql);
    
    // safe method
    if($stmt = $conn->prepare("SELECT Email,Password from account where Email=? and Password=?")){
    
        $stmt->bind_param("ss",$u,$p);
        $stmt->execute();
        $stmt->bind_result($Email,$Password);
        if($stmt->fetch()){
            $_SESSION['Email'] =$u; //assign the username to session value
            $message1= $_SESSION['Email']." Login Successful!";
            echo "<script>alert('$message1');</script>";
            echo "<script>window.location.assign('test.php');</script>";
        }
        else{
            $message = "Login Fail.Please Try again!";
            echo "<script>alert('$message');</script>";
            echo "<script>window.location.assign('login.php');</script>";
    
    
    
        }
        $stmt->close();
    }
    }
    
   

?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/main.css" rel="stylesheet"> 
    
</head>
<script>
    $(document).ready(function(){

    $('.input').focus(function(){
    $(this).parent().find(".label-txt").addClass('label-active');
    });

    $(".input").focusout(function(){
    if ($(this).val() == '') {
        $(this).parent().find(".label-txt").removeClass('label-active');
    };
    });
    });  
</script>

    <form name="login"   method="POST">
    <h3 style="color: rgb(120,120,120)">Logn In</h3>
    <label>
        <p class="label-txt">Email</p>
        <input type="text" class="input" name="Email" value="<?php if(isset($_COOKIE["Email"])) { echo $_COOKIE["Email"]; } ?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Password</p>
        <input type="password" class="input" name="Password"  value="<?php if(isset($_COOKIE["Password"])) { echo $_COOKIE["Password"]; } ?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <div class="form-group">  
     <input type="checkbox" name="remember"/>  
     Remember me
    </div>   
    <button type="submit" name="submit" value="Sign In">LOGN IN</button>
    
    <div style="margin-top:30px auto;text-align:center">Have an account? <a href="register.php">register</a></div>
    </form>
</html>