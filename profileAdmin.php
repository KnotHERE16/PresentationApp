<?php
session_start();
//check if img just uploaded
if ($_SESSION["imgUpload"] == 1) {
    echo '<script type="text/javascript">alert("' . $_SESSION['imgMessage'] . '");</script>';
}
$_SESSION["imgUpload"] = 0; 

if( isset( $_SESSION['studentid']))
{
    $condition = $_SESSION['studentid'];
}
else if( isset( $_SESSION['staffid']))
{
    $condition = $_SESSION['staffid'];
}
else
{
    $condition = $_SESSION['guestid'];
}

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
$phparray = array();
$x = 0; //array index
?>
<!DOCTYPE html>
<script type="text/javascript">
</script>

<html>
<head>
<title>Profile</title>
<link href="css/profileAdmin.css" rel="stylesheet" type="text/css">
<!-- META FOR BOOTSTRAP CSS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
<div class="profile">
<!-- PROFILE DETAILS -->
<?php
$result = mysqli_query($conn,"SELECT image, name, schoolid, email 
						FROM staff WHERE staffid = '$condition'");
?>
<?php 
while($row = $result->fetch_assoc()) //get admin ID
{
	$image = "images/". $row ["image"];
	$name = $row ["name"];
	$schoolID = $row["schoolid"];
	$email = $row["email"];
	
	$_SESSION["schoolid"] = $schoolID;
}
?>
<div class=imgAndUpload>
<img class="rounded-circle" src="<?php echo $image; ?>" onerror="this.src='default.png'" />
<!-- UPLOAD IMAGE -->
</br></br>
<form action="process/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
    <input type="submit" value="Upload Image" name="submit" id="submit">
</form>
</div>
<?php
echo "<div class='profileDetails'>"; //profile details display
	echo	$name;
	echo	"</br>";
	echo	$schoolID;
	echo	"</br>";
	echo 	$email;
	echo "</div>";
	//CHANGE EMAIL
	echo '<form action="changeEmail.php" method ="post" enctype="multipart/form-data">';
    echo '<input type="submit" value="Change Email" name="changeEmail" id="changeEmail">';
    echo '</form>';
?>

<!-- START OF ASSESSOR -->
<h1 class="assessorTitle">Registered assessor for these presentations:</h1>
	<div class="assessor">
	<?php
	$getAssessor = mysqli_query($conn, "SELECT scheduleID FROM assessor
										WHERE staffid = '$condition'") 
										or die ($conn->error);
		while($row = $getAssessor->fetch_assoc())
		{
			$assessorScheduleID = $row["scheduleID"];
			$getAssessorDetails = mysqli_query($conn, "SELECT date, time, venue, module
														FROM schedule
														WHERE scheduleID = '$assessorScheduleID'")
														or die ($conn->error);
			while($get = $getAssessorDetails->fetch_assoc())
			{//get assessor details
				echo "<div class='assessorDetails'>";
				echo "<form action='process/deleteAssessor.php'>";
				echo "<input type='hidden' name='deleteAssessor' id='deleteAssessor' value='$assessorScheduleID'/>";
				echo "<input type='submit'class='close' aria-label='Close' value    ='x'/>";
				echo "</form>";
				echo "</br>";
				echo $get["date"]. "</br>". $get["time"].
						"</br>". $get["venue"]. "</br>".
						$get["module"];
				echo "</div>";
			}
			
		}
	?>
	</div>
	
<!-- START OF SCHEDULER -->
<h1 class="schedulerTitle">Scheduled the following slots:</h1>
	<div class="scheduler">
	<?php
	$getScheduler = mysqli_query($conn, "SELECT scheduleID FROM schedule
										WHERE staffid = '$condition'") 
										or die ($conn->error);
		while($row = $getScheduler->fetch_assoc())
		{
			$schedulerScheduleID = $row["scheduleID"];
			$getSchedulerDetails = mysqli_query($conn, "SELECT date, time, venue, module, url
														FROM schedule
														WHERE scheduleID = '$schedulerScheduleID'")
														or die ($conn->error);
			while($get = $getSchedulerDetails->fetch_assoc())
			{//get scheduler details
			    $url = $get["url"];
				echo "<div class='schedulerDetails'>";
				echo "<form action='process/deleteSchedule.php'>";
				echo "<input type='hidden' name='deleteSchedule' id='deleteSchedule' value='$schedulerScheduleID'/>";
				echo "<input type='submit'class='close' aria-label='Close' value    ='x'/>";
				echo "</form>";
				echo "</br>";
				echo $get["date"]. "</br>". $get["time"].
						"</br>". $get["venue"]. "</br>".
						$get["module"];
				echo "<form action='process/emailpre.php' method='post'> ";
				echo "<input type='submit' class='btn btn-outline-secondary' value='Email' />";
				echo "<input type='hidden' name='escheduleid' value                ='$schedulerScheduleID' />";
				echo "</form>";		
				echo $url;
				echo "</div>";
			}
			
		}
	?>
	</div>

</div>
</div>
<!-- END BAR IN WEBSITE -->
<?php include("endbar.php"); ?>
<!-- SCRIPT FOR CSS BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>