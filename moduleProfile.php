<?php
error_reporting(0);
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
<link href="css/moduleProfile.css" rel="stylesheet" type="text/css">
<!-- META FOR BOOTSTRAP CSS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 

<!--ASSETS FOR PIE CHART-->
<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
      <script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
</head>
<body>
<div class="container">
<?php
$condition = $_POST["hiddenVal"];
$totalSpeech = 0;
$totalClarity = 0;
$totalExplanation = 0;
$totalRelevance= 0;
$totalDesign = 0;
$totalKnowledge = 0;
$count = 0;
$getData = mysqli_query($conn,"SELECT scheduleID FROM schedule WHERE module = '$condition'");//query scheduleID based on module
	
	while($row = $getData->fetch_assoc())
	{
	    $dataScheduleID = $row["scheduleID"];
	    $getMarks = mysqli_query($conn, "SELECT speech, clarity, explanation
									, relevance, design, knowledge, remark, totalscore
									FROM assessmentmark 
									WHERE scheduleID = '$dataScheduleID'
									")
									or die ($conn->error);
	    while($row = $getMarks->fetch_assoc())
	        {//retrieving and tallying up marks
        	    $speech = $row["speech"];
        	    $clarity = $row["clarity"];
        	    $explanation = $row["explanation"];
        	    $relevance = $row["relevance"];
        	    $design = $row["design"];
        	    $knowledge = $row["knowledge"];
        	    $totalSpeech = $totalSpeech + $speech;
                $totalClarity = $totalClarity + $clarity;
                $totalExplanation = $totalExplanation + $explanation;
                $totalRelevance= $totalRelevance + $relevance;
                $totalDesign = $totalDesign + $design;
                $totalKnowledge = $totalKnowledge + $knowledge;
                $count++;
        	}
	}//average marks value
        $averageSpeech = $totalSpeech/$count;
    	$averageClarity = $totalClarity/$count;
    	$averageExplanation = $totalExplanation/$count;
    	$averageRelevance = $totalRelevance/$count;
    	$averageDesign = $totalDesign/$count;
    	$averageKnowledge = $totalKnowledge/$count;	
?>
</br>
<h1 class=".display-2"><?php echo $condition;?></h1>
<div id="piechart"></div><!--pie chart-->
<script>
anychart.onDocumentReady(function() {
  // set the data
  var data = [
      {x: "Speech", value: <?php echo $averageSpeech; ?>},
      {x: "Clarity", value: <?php echo $averageClarity; ?>},
      {x: "Explanation", value: <?php echo $averageExplanation; ?>},
      {x: "Relevance", value: <?php echo $averageRelevance; ?>},
      {x: "Design", value: <?php echo $averageDesign; ?>},
      {x: "Knowledge", value: <?php echo $averageKnowledge; ?>},
  ];

  // create the chart
  var chart = anychart.pie();

  // set the chart title
  chart.title("Average marks for this module");

  // add the data
  chart.data(data);

  // display the chart in the container
  chart.container('piechart');
  chart.draw();

});
</script>
</br></br>
<h3 class=".display-4">Total Assessments for this module: <?php echo $count;?></h1>
<h1 class="scheduleTitle">Schedules of this module:</h1>
	<div class="schedule">
	<?php
	$getSchedule = mysqli_query($conn,"SELECT scheduleID, date, time, venue, presenter FROM schedule WHERE module = '$condition'");
		while($row = $getSchedule->fetch_assoc())
		{//retrieve schedule details
			
				echo "<div class='scheduleDetails'>";
				echo "Schedule ID: ". $row["scheduleID"]. "</br>". $row["date"].
						"</br>". $row["time"]. "</br>".
						$row["venue"] ."</br>". $row["presenter"];
				echo "</div>";
		}
	?>
	</div>
</div>

<!-- END BAR IN WEBSITE -->
<?php include("endbar.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>