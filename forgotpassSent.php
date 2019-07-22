<!-- Same as the forgotpass page with a message to show email has been sent successfully -->

<html>
<head>
	<title> Forgot Password </title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>
<script type="text/javascript" src="js/forgotpass.js"> </script>


<body>
<?php 
if( isset( $_SESSION['studentid']))
{
    include("menubar/menubarStudent.php");
}
else if( isset( $_SESSION['staffid']))
{
    include("menubar/menubar.php");
}
else if( isset( $_SESSION['guestid']))
{
    include("menubar/menubarStudent.php");
}
else
{
    include("menubar/menubarNotLogin.php");
}?>
<form action="process/forgotpass2.php" method="POST">

    <div class="form-group">
      <label for="email">Enter your registered Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
	<p style="color:green"> Email has been sent successfully. Please check your email's spam folder! </p>
    <button type="submit" class="btn btn-primary">Submit</button>
  
</div>


</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!--endbar-->
  <?php include("endbar.php"); ?>
</body>

</html>