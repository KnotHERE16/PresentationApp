<?php
session_start();
?>
<html>
<head>
	<title> Login Page </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>
<script type="text/javascript" src="js/login.js"> </script>


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
<form action="process/login2.php" method="POST">
  
 
      <div class="option">
	<input type="radio" name="option" value="1" checked onClick="studentInput()"> Student 
	<input type="radio" name="option" value="2" onClick="otherInput()"> Others <br><br>
	</div>
	 <div class="form-group-id">
	     <div id="labelstudentid">
      <label for="studentid">Student ID:</label>
      </div>
      <input type="number" class="form-control" id="studentid" placeholder="Enter Student ID" pattern=".{8}" title="Enter 8 numbers of your student ID"name="studentid" >
    </div>
    <div class="form-group-email">
    <div id="labelemail" style="display:none">
      <label for="email">Email:</label>
      </div>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" style="display:none" >
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
    </div>
    <a href="forgotpass.php">Forgot password?</a><br>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!--ENDBAR-->
  <?php include("endbar.php"); ?>
</body>

</html>