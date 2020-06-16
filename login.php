<?php
include 'connection.php'; 
session_start();
if($_POST)
	{
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];
        
		$sql = "SELECT * FROM `account` where Email = '".$Email."' and Password = '".$Password."' ";
        $query =  mysqli_query($conn, $sql);

		if(mysqli_num_rows($query)>0)
		{
			$row = mysqli_fetch_assoc($query);
			session_start();
            $_SESSION['Email'] = $row['Email'];
            if(password_verify($Password,$pw)){
            header('Location: test.php');
        }
		}
		else
		{
			echo "<script> alert('Invalid Email or Password.'); </script>";
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