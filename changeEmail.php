<?php
session_start();
include("process/Sqlconnect.php");
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
<!DOCTYPE html>
<script type="text/javascript">
</script>

<html>
<head>
<title>Profile</title>
<link href="changeEmail.css" rel="stylesheet" type="text/css">
<!-- META FOR BOOTSTRAP CSS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    </br>
    <?php  ?>
    <form action="process/changeEmail2.php" method="post">
    <div class="form-group">
        <label for="usr">New Email:</label>
        <input type="text" class="form-control" id="newEmail" name="newEmail" /></br>
        <input type="submit" name="submit" class="btn btn-primary" />
    </div>
    </form>
</div>
<!-- END BAR IN WEBSITE -->
<div class="endbar"></div>
<img src="sevenApp.png" alt="sevenAppLogo" width="125" height="125" style="margin-left:30px;">
<!-- SCRIPT FOR CSS BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <!--ENDBAR-->
 <?php include("endbar.php"); ?>
</body>
</html>