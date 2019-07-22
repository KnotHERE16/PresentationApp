<?php
ob_start();
include("../index.php");
ob_end_clean();

include("Sqlconnect.php");



$otp= $_POST["otpname"];

if(isset($_POST["otpboxname"])){
$boxindex= $_POST["otpboxname"];
$schedule = $todayarray['scheduleID'][$boxindex];
}
if(isset($_POST["otplinkname"])){
    $schedule=$_POST["otplinkname"];
}
$sql = "SELECT * FROM `todayview` WHERE `scheduleID`= $schedule AND `otp` = $otp";
 $result = $conn->query($sql);
            if ($result->num_rows > 0) {
               $value = "true";
            } else {
                $value = "false";
            }
     
            echo $value;
?>