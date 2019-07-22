<?php
error_reporting(0);
include("Sqlconnect.php");
session_start();
$scheduleID = $_GET['deleteSchedule'];
$ID = $_SESSION['staffid'];
$sql = mysqli_query($conn, "DELETE FROM schedule WHERE scheduleID = '$scheduleID' AND staffid = '$ID'") or die ($conn->error);
$sql2 = mysqli_query($conn, "DELETE FROM assessor WHERE scheduleID = '$scheduleID'") or die ($conn->error);


if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "";
}
if ($conn->query($sql2) === TRUE) {
    echo "";
} else {
    echo "";
}

echo "<script type='text/javascript'>";
echo "window.location.href = '../profileAdmin.php';";
echo "</script>";
?>