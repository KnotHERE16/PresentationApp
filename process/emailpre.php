<?php 
session_start();
$escheduleid=$_POST["escheduleid"];

require_once "Sqlconnect.php";
$query="SELECT * from schedule where scheduleID='$escheduleid'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
$row=mysqli_fetch_assoc($result);
if($count==1)
{
	$date=$row["date"];
	$_SESSION["date"] = $date;
	$time=$row["time"];
	$_SESSION["time"] = $time;
	$venue=$row["venue"];
	$_SESSION["venue"] = $venue;
	$scheduleID=$row["scheduleID"];
	$_SESSION["scheduleID"]=$scheduleID;
    $module=$row["module"];
    $_SESSION["module"] = $module;
	header ("Location: https://presentapp.site/process/email.php");
}
?>