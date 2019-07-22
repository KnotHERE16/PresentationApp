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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
<link href="..css/email.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
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

<!-- The Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p align="center">Your email has been sent</p>
          <p align="center">Do you want to send new email?</p>
        </div>
        <div class="modal-footer">
        <a href="https://presentapp.site/process/email.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Yes</a>
        <a href="https://presentapp.site/" class="btn btn-primary btn-lg " role="button" aria-pressed="true">No</a>

        </div>
      </div>
      
    </div>
  </div>
  
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script>
$(document).ready(function(){
   $("#myModal").modal();
});
//made by csandreas1 for Stackoverflow
</script>
  <!--ENDBAR-->
 <?php include("../endbar.php"); ?>
</body>

</html>

