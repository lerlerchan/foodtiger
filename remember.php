<?php


if(!empty($_POST["remember"])) {
	setcookie ("Email",$_POST["Email"],time()+ 3600);
	setcookie ("Password",$_POST["Password"],time()+ 3600);
	echo "Cookies Set Successfuly";
} else {
	setcookie("Email","");
	setcookie("Password","");
	echo "Cookies Not Set";
}


if(!isset($_SESSION["Email"]))
{
 header("location:test.php");
}
?>  

 
