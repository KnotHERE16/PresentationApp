<html>
<head>
	<title> Reset Password </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>
<script>
//function to check password and confirm password whether they are same and disable the submit button if they are not the same. 
function checkpassword()
{
if (document.getElementById('newpass').value == document.getElementById('newconfirm').value) 
{
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'passwords are matching';
	document.getElementById('submit').disabled = false;
} 
else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'passwords are not matching';
	document.getElementById('submit').disabled = true;
}
}
</script>


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
<form action="process/resetPassword2.php" method="POST">


    <div class="form-group">
    <label for="newpass">New Password:</label>
	<input type="password" name="newpass" id="newpass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 or more characters must contains at least 1 lowercase letter and uppercase letter and 1 number.">
	</div>
	
	
	<div class="form-group">
	<label for="newconfirm">Confirm New Password</label>
    <input type="password" name="newconfirm" id="newconfirm" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 or more characters must contains at least 1 lowercase letter and uppercase letter and 1 number." onkeyup="checkpassword()">
    </div>
	<span id="message"> </span> <br>
	
	
	
  <input type="submit" class="submit" id="submit" class="btn-btn-primary" value="Submit" onclick="checkpassword()" disabled> 

</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>