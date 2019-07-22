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
<title>PresentApp</title>
<link href="css/remark.css" rel="stylesheet" type="text/css">
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
</br></br>
<?php
$scheduleNum = $_POST["hiddenSchedule"];
$studID = $_POST["hiddenStudID"];
$totalSpeech = 0;
$totalClarity = 0;
$totalExplanation = 0;
$totalRelevance= 0;
$totalDesign = 0;
$totalKnowledge = 0;
$count = 0;
$getRemark = mysqli_query($conn, "SELECT assessmentid, speech, clarity, explanation
									, relevance, design, knowledge, remark, totalscore
									FROM assessmentmark 
									WHERE scheduleID = '$scheduleNum'
									AND sid = '$studID'")
									or die ($conn->error);
									
	while($row = $getRemark->fetch_assoc())
	{
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
	$averageSpeech = $totalSpeech/$count;
	$averageClarity = $totalClarity/$count;
	$averageExplanation = $totalExplanation/$count;
	$averageRelevance = $totalRelevance/$count;
	$averageDesign = $totalDesign/$count;
	$averageKnowledge = $totalKnowledge/$count;
?>
<div id="piechart"></div>
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
  chart.title("Average Assessment Metric Values");

  // add the data
  chart.data(data);

  // display the chart in the container
  chart.container('piechart');
  chart.draw();

});
    
</script>
</br></br>
<h1>Comments</h1>
<?php
$getRemark2 = mysqli_query($conn, "SELECT assessmentid, speech, clarity, explanation
									, relevance, design, knowledge, remark, totalscore
									FROM assessmentmark 
									WHERE scheduleID = '$scheduleNum'
									AND sid = '$studID'")
									or die ($conn->error);
    while($row = $getRemark2->fetch_assoc())
	    {
	        $speech = $row["speech"];
    	    $clarity = $row["clarity"];
    	    $explanation = $row["explanation"];
    	    $relevance = $row["relevance"];
    	    $design = $row["design"];
    	    $knowledge = $row["knowledge"];
    		echo "<div class='remark'>";
    		echo "Assessment ID: ". $row["assessmentid"]. "</br>".
    				"Speech: ". $speech. " || ".
    				"Clarity: ". $clarity. " || ".
    				"Explanation: ". $explanation. " || ".
    				"Relevance: ". $relevance. " || ".
    				"Design: ". $design. " || ".
    				"Knowledge: ". $knowledge. " || ". "</br>".
    				"Total Score: ". $row["totalscore"]. "</br>";
    		echo "<div class='comment'>";		
    		echo "Remark:". "</br>". $row["remark"];
    		echo "</div>";
    		echo "</div>";
	    }
	
?>

</div>
<!-- END BAR IN WEBSITE -->
<?php include("endbar.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>