<!-- Same as register page with an error to show Email is already registered! -->



<html>
<head>
<title>Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 

</head>
<script type="text/javascript" src="js/register.js"> </script>


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
}
?>


<form action="process/register2.php" method ="POST">
<h1 style="text-align: center;"> Registration </h1>

<div class="container">
<div class="register">
	<div class="option">
	<input type="radio" id="option" name="option" value="1" checked onClick="studentInput()"> Student 
	<input type="radio" id="option" name="option" value="2" onClick="staffInput()"> Lecture/Staff
	<input type="radio" id="option" name="option" value="3" onClick="guestInput()"> Guest <br><br>
	</div>

		<div class="form-group-name">
	     <div id="labelname">
      <label for="name">Name:</label>
      </div>
		<input type="text" name="name" id="name" class="form-control">
    </div>
	
	<div class="form-group-studentid">
	     <div id="labelstudentid">
      <label for="studentid">Student ID:</label>
      </div>
      <input type="number" name="studentid" id="studentid" pattern=".{8}" class="form-control" placeholder="Enter 8 numbers of your ID.">
    </div>
	
	<div class="form-group-schoolid">
	     <div id="labelschoolid" style="display:none">
      <label for="studentid">Staff ID:</label>
      </div>
      <input type="text" name="schoolid" id="schoolid" pattern=".{8,}" class="form-control" style="display:none">
    </div>
	
	<div class="form-group-course">
	     <div id="labelcourse">
      <label for="course">Major:</label>
      </div>
      <select name="course" id="course" class="form-control">
    <option value="Bachelor of Business in Accounting">Bachelor of Business in Accounting</option>
    <option value="Bachelor of Business in Banking">Bachelor of Business in Banking</option>
    <option value="Bachelor of Arts in Journalism ">Bachelor of Arts in Journalism </option>
    <option value="Bachelor of Arts in Communication and Media Studies">Bachelor of Arts in Communication and Media Studies</option>
	<option value="Bachelor of Science in Cyber Security and Forensics">Bachelor of Science in Cyber Security and Forensics</option>
	<option value="Bachelor of Science in Computer Science">Bachelor of Science in Computer Science</option>
	<option value="Bachelor of Business in Business Law">Bachelor of Business in Business Law</option>
	<option value="Bachelor of Arts in Tourism and Events">Bachelor of Arts in Tourism and Events</option>
	
  </select>
    </div>
	
	<div class="form-group-affiliation">
	     <div id="labelAff" style="display:none">
      <label for="affiliation">Affiliation:</label>
      </div>
      <input type="text" name="affiliation" id="affiliation" class="form-control" style="display:none"> 
    </div>
	
	<div class="form-group-email">
	     <div id="labelemail">
      <label for="email">Email:</label>
      </div>
      <input type="email" name="email" id="email" class="form-control" placeholder="enter a valid email address">
    </div>
	
	<div class="form-group-password">
	     <div id="labelpassword">
      <label for="password">Password:</label>
      </div>
      <input type="password" name="password" id="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 or more characters must contains at least 1 lowercase letter and uppercase letter and 1 number.">
    </div>
	
	<div class="form-group-confirm">
	     <div id="labelconfirm">
      <label for="confirm">Confirm Password:</label>
      </div>
      <input type="password" name="confirm" id="confirm" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 or more characters must contains at least 1 lowercase letter and uppercase letter and 1 number." onkeyup="checkpassword()"> 
    </div>
	
	<span id="message"> </span><br>
	
	<p style="color:red"> Email is already registered! </p>
	<button type="submit" class="btn btn-primary" id="submit" name="submit" onclick="submitform()" disabled>Submit</button>
</div>
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <!--ENDBAR-->
 <?php include("endbar.php"); ?>
</body>

</html>
