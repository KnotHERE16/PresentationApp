<?php
error_reporting(0);
include("Sqlconnect.php");
session_start();
$scheduleID = $_GET['deleteAssessor'];
if( isset( $_SESSION['studentid']))
{
    $ID = $_SESSION['studentid'];
    $sql = mysqli_query($conn, "DELETE FROM assessor WHERE scheduleID = '$scheduleID' AND studentid='$ID'") or die ($conn->error);
}
else if( isset( $_SESSION['staffid']))
{
    $ID = $_SESSION['staffid'];
    $sql = mysqli_query($conn, "DELETE FROM assessor WHERE scheduleID = '$scheduleID' AND staffid = '$ID'") or die ($conn->error);
}
else
{
    $ID = $_SESSION['guestid'];
    $sql = mysqli_query($conn, "DELETE FROM assessor WHERE scheduleID = '$scheduleID' AND guestid = '$ID'") or die ($conn->error);
}


if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "";
}


if(isset( $_SESSION['studentid']))
{
echo "<script type='text/javascript'>";
echo "window.location.href = '../profile.php';";
echo "</script>";
}
else if(isset( $_SESSION['staffid']))
{
echo "<script type='text/javascript'>";
echo "window.location.href = '../profileAdmin.php';";
echo "</script>";
}
else if(isset( $_SESSION['guestid']))
{
echo "<script type='text/javascript'>";
echo "window.location.href = '../profile.php';";
echo "</script>"; 
}
?>