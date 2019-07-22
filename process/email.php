<?php
session_start();
if( isset( $_SESSION['studentid']))
{
    include("../menubar/menubarStudent.php");
}
else if( isset( $_SESSION['staffid']))
{
    include("../menubar/menubar.php");
}
else if( isset( $_SESSION['guestid']))
{
    include("../menubar/menubarStudent.php");
}
else
{
    include("../menubar/menubarNotLogin.php");
}


if (isset($_SESSION["scheduleID"]))
{
$scheduleID= $_SESSION["scheduleID"];
    
}

if(isset($_SESSION["date"]))
{
$date= $_SESSION["date"];
}

if(isset($_SESSION["time"]))
{
$time= $_SESSION["time"];
}

if(isset($_SESSION["venue"]))
{
$venue= $_SESSION["venue"];
}

if (isset($_SESSION["module"]))
{
$module= $_SESSION["module"];
}
?>

<html>
<head>
<title>Emailing </title>
<link href="email.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
<H2 style="text-align:center"> Emailing </h2>
<form method="post" action ="email_process.php">
<div class="form-group" >

<label for="to"style="margin-left:15%">To: </label>
<textarea rows="3" name="mail_to" style="width:70%; margin-left:15%" required></textarea>
</div>
</div>
<div class="form-group" >
<label for="subject" style="margin-left:15%">Subject: </label>
<input class="form-control" style="width:70%; margin-left:15%" class="form-control" name="mail_sub" type="text" required></input>
</div>

<div class="form-group" >
<label for="message" style="margin-left:15%">Message: </label>
<textarea class="form-control" rows="5" style="width:70%; margin-left:15%;"class="floatCtrl" name="mail_msg" type="text" required></textarea>
</div>



<button type="submit" id="submit" name="submit" class="btn btn-primary" style="margin-left:45%" value="">Send email</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <!--ENDBAR-->
 <?php include("../endbar.php"); ?>
</body>

</html>
