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
<link href="css/profile1.css" rel="stylesheet" type="text/css">
<!-- META FOR BOOTSTRAP CSS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>
<body>
<div class="container">
<div class="profile">
<!-- PROFILE DETAILS -->
<?php
$condition = $_POST["hiddenVal"];

$result = mysqli_query($conn,"SELECT image, name, course, studentid, email 
						FROM student WHERE studentid = '$condition'");
?>
<?php 
while($row = $result->fetch_assoc())
{
	$image = "images/". $row ["image"];
	$name = $row ["name"];
	$studentID = $row["studentid"];
	$course = $row["course"];
	$email = $row["email"];
}
?>
<img class="rounded-circle" src="<?php echo $image; ?>" onerror="this.src='default.png'" />
<?php
echo "<div class='profileDetails'>";
	echo	$name;
	echo	"</br>";
	echo	$studentID;
	echo	"</br>";
	echo	$course;
	echo	"</br>";
	echo 	$email;
	echo "</div>";
?>
<?php
$getscheduleID = mysqli_query($conn,"SELECT DISTINCT scheduleID FROM assessmentmark
				WHERE sid = '$condition'") or die($conn->error);
				
?>
<!-- CHART -->
<div id="chart">
	<div>
	<table>
		<tbody>
			<tr class="charttitleholder">
				<td colspan="4" class="charttitle">
				<h1 class="chartTitle">Student Performance </br> (Average Marks out of 30)</td></h1>
			</tr>
			<tr class="bars">
			<?php
			while($row = $getscheduleID->fetch_assoc())
			{
			?>		
				<td>
				<?php 
					$count = 0;
					$totalMarks = 0;
					$scheduleID = $row ["scheduleID"];
					$getAverageMarks = mysqli_query($conn, "SELECT totalscore FROM assessmentmark
															WHERE sid = '$condition'
															AND scheduleID = '$scheduleID'")
															or die ($conn->error);
															
					while($graphScore = $getAverageMarks->fetch_assoc())
					{//get totalscore average
						$marks = $graphScore["totalscore"];
						$totalMarks = $totalMarks + $marks;
						$count = $count+1;
					}
					$averageMarks = $totalMarks/$count;
					echo $averageMarks;
					$bar_height = $averageMarks *2.5;
					echo "<div style='height: $bar_height%; background-color: red;';
							data-box='$scheduleID' onclick='sdisplay(this)'>";
					echo "</div>";
					
					$getscheduleDetails = mysqli_query($conn, "SELECT date, module, venue FROM schedule
																WHERE scheduleID = '$scheduleID'")
																or die ($conn->error);
					while($graphData = $getscheduleDetails->fetch_assoc())
					{//display schedule details
						echo $graphData["module"]. "</br>" .$graphData["date"]. "</br>". $graphData["venue"];
					}
				?>
				</td>
			<?php	
			}
			?>			
			</tr>
		</tbody>	
	</table>
	</div>
</div>
<!-- END OF CHART -->
<!-- START OF ASSESSOR -->
<h1 class="assessorTitle">Registered assessor for these presentations:</h1>
	<div class="assessor">
	<?php
	$getAssessor = mysqli_query($conn, "SELECT scheduleID FROM assessor
										WHERE studentid = '$condition'") 
										or die ($conn->error);
		while($row = $getAssessor->fetch_assoc())
		{
			$assessorScheduleID = $row["scheduleID"];
			$getAssessorDetails = mysqli_query($conn, "SELECT date, time, venue, module
														FROM schedule
														WHERE scheduleID = '$assessorScheduleID'")
														or die ($conn->error);
			while($get = $getAssessorDetails->fetch_assoc())
			{//get assessor details and display
				echo "<div class='assessorDetails'>";
				echo $get["date"]. "</br>". $get["time"].
						"</br>". $get["venue"]. "</br>".
						$get["module"];
				echo "</div>";
			}
			
		}
	?>
	</div>

</div>
</div>
<form action='remark.php' method='post' id='form2' name='form2'>
<input type='hidden' id='hiddenSchedule' name='hiddenSchedule'>
<input type='hidden' id='hiddenStudID' name='hiddenStudID'>
</form>
</div>
<script type="text/javascript">
var boxvalue;

function sdisplay(boxdata)//chart boxdata retrieval
{
	boxvalue = boxdata.getAttribute("data-box")
	document.getElementById("hiddenSchedule").value = boxvalue;
	document.getElementById("hiddenStudID").value = "<?php echo $studentID ?>";
	document.form2.submit();
}
</script>
<!-- END BAR IN WEBSITE -->
<?php include("endbar.php"); ?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>