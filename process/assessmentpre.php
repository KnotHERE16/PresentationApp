<?php
session_start();
$successname=$_POST['successname'];

require_once "Sqlconnect.php";
$query= "SELECT * FROM schedule where scheduleID='$successname'";
$result= mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
if ($count==1)
{
	$date=$row["date"];
	$_SESSION["date"] = $date;
	$time=$row["time"];
	$_SESSION["time"] = $time;
	$venue=$row["venue"];
	$_SESSION["venue"] = $venue;
	$module=$row["module"];
	$_SESSION["module"]= $module;
	$scheduleID=$row["scheduleID"];
	$_SESSION["scheduleID"]=$scheduleID;
	header ("Location: https://presentapp.site/process/assessment.php");
}

else
{
    echo "No";
    echo $successname;
}
?>