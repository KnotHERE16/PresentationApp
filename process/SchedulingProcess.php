<?php
session_start();
header("refresh:4;url=../index.php");
include ("Sqlconnect.php"); //connect to sql database

$staffid = $_SESSION["staffid"];
$date = $_POST["date"];
$time = $_POST["time"];
$venue = $_POST["venue"];
$module = $_POST["module"];
$presenter = $_POST["presenter"];

$otp = mt_rand(1000,9999);

$sql = "INSERT INTO schedule (`date`,`time`,`venue`,`module`,`presenter`,`staffid`,`otp`)
VALUES ('$date' ,'$time','$venue','$module','$presenter','$staffid','$otp')";

if ($conn->query($sql) === TRUE) 
{
    $last_id = $conn->insert_id;
    $url = "www.presentapp.site/schlink.php?id=".$last_id;
    
    $sql = "UPDATE `schedule` set `url`='$url' where `scheduleID`=$last_id";
    
    if ($conn->query($sql) === TRUE) 
{
   echo " Successfully Schdule <br>";

echo "The one time password is: ", $otp."<br>";
echo $url;
echo "<br> Redirecting to homepage........";

}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

