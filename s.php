
  <?php  
session_start();  

?> 
<html>  
 <head>  
  <title>Webslesson - Tutorial</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 
 </head>  
 <body>  
  <div class="container box">  
   <h3 align="center">Welcome - <?php echo $_SESSION["Email"]; ?></h3>
   <br />
   <p><a href="test.php">ds</a></p>
   <p><a href="lognout.php">Logout</a></p>
  </div>  
 </body>  
</html>
