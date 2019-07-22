<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<link rel="apple-touch-icon" sizes="57x57" href="icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
<link rel="manifest" href="icon/manifest.json">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
<link href="css/homepage.css" rel="stylesheet" type="text/css"> 
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
include("process/Sqlconnect.php");
if( isset( $_SESSION['studentid']))
{
    $nowuser = $_SESSION['studentid'];
    include("menubar/menubarStudent.php");
}
else if( isset( $_SESSION['staffid']))
{
    $nowuser = $_SESSION['staffid'];
    include("menubar/menubar.php");
}
else if( isset( $_SESSION['guestid']))
{
    $nowuser = $_SESSION['guestid'];
    include("menubar/menubarStudent.php");
}
else
{
    include("menubar/menubarNotLogin.php");
}



if(isset($_SESSION['studentid']) OR isset( $_SESSION['staffid']) OR isset( $_SESSION['guestid']))
{
    include("yeshomepage.php");
}
else{
    include("nohomepage.php");
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/homepage.js"></script>
    <script>schedulearray = <?php echo json_encode($todayarray['scheduleID']); ?>;</script>
<!-- ENDBAR -->
<?php include("endbar.php"); ?>
</body>
</html>