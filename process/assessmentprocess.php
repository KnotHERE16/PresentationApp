<?php
session_start();
include "Sqlconnect.php";
$sid = $_POST["sid"];
$speech = $_POST["Set1"];
$clarity = $_POST["Set2"];
$explanation = $_POST["Set3"];
$relevance = $_POST["Set4"];
$design = $_POST["Set5"];
$knowledge = $_POST["Set6"];
$remark = $_POST["remark"];
$totalscore = $_POST["total"];
$scheduleID = $_POST["scheduleID"];

$query = "SELECT * FROM schedule where scheduleID='$scheduleID'";
$result = mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
if($count==1)
{
$time = $row['time'];
$date = $row['date'];
$venue = $row['venue'];
}

  
$sql = "INSERT INTO assessmentmark (sid,scheduleID,speech,clarity,explanation,relevance,design,knowledge,remark,totalscore)
VALUES ('$sid','$scheduleID','$speech' ,'$clarity','$explanation','$relevance','$design','$knowledge','$remark','$totalscore')";

if ($conn->query($sql) === TRUE) 
{
    header ("Location:https://presentapp.site/process/assessmentpost.php");
}
 else {
     header ("Location:http://presentapp.site/process/assessment.php");
}


$conn->close();
?>