<?php
session_start();

if( isset( $_SESSION['studentid']))
{
    include("../menubar/menubarStudent.php");
}
else if( isset( $_SESSION['staffid']))
{
    include("../menubar/menubar.php");
}
else if( isset( $_SESSION['guestid']))
{
    include("../menubar/menubarStudent.php");
}
else
{
    include("../menubar/menubarNotLogin.php");
}

if(isset($_SESSION["scheduleID"]))
{
$scheduleID= $_SESSION["scheduleID"];
}

if(isset($_SESSION["date"]))
{
$date= $_SESSION["date"];
}

if(isset($_SESSION["time"]))
{
$time= $_SESSION["time"];
}

if(isset($_SESSION["venue"]))
{
$venue= $_SESSION["venue"];
}

if(isset($_SESSION["module"]))
{
    $module= $_SESSION["module"];
}
?>

<html>
<head>

<title>Assessment </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
<link href="../css/assessment.css" rel="stylesheet" text="text/css">
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<script type="text/javascript">
function setRadios()
{
	function sumRadios()
	{
		var total = 0, i = 1, oForm = this.form;
		while (radgrp = oForm.elements['Set' + (i++)])
		{
			j = radgrp.length;
			do
				if (radgrp[--j].checked)
				{
					total += Number(radgrp[j].value);
					break;
				}
			while (j);
		}
		oForm.elements.total.value = total.toFixed(0);
	}

var i = 0, input, inputs = document.getElementById('f1').getElementsByTagName('input');
while (input = inputs.item(i++))
	if (input.name.match(/^Set\d+$/))
		input.onclick = sumRadios;
}
onload =setRadios;
</script>
</head>
<body>
<h2 style="text-align:center; font-size:30pt">Assessment </h2>
<form id="f1" action="assessmentprocess.php" method="POST">
<table class="table">
    <tbody>
        <tr>
            <td>Date</td>
            <td> --- </td>
            <td><b style="color:green"><?php echo $date?></b></td>
        </tr>
        <tr>
            <td>Time</td>
            <td> --- </td>
            <td><b style="color:green"><?php echo $time?></b></td>
        </tr>
        <tr>
            <td>Venue</td>
            <td> --- </td>
            <td><b style="color:green"><?php echo $venue?></b> </td>
        </tr>
        <tr>
            <td>Module</td>
            <td> --- </td>
            <td><b style="color:green"><?php echo $module?> </b></td>
        </tr>
        <tr>
            <td>Schedule ID</td>
            <td> --- </td>
            <td><b style="color:green"><?php echo $scheduleID?></b> </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        
    </tbody>
</table>
<label for="sid" class="left" style="margin-left:1%; padding-top:-2%"> Student ID: </label> 
<input type="text" name="sid" id="sid" class="right" size="10" pattern=".{8}"required>  
<input type="hidden" id="scheduleID" name="scheduleID" value=<?php echo $scheduleID ?></input>

<fieldset>
<legend>Speech</legend>

<b>(Lowest)</b></label><input id="r1" type="radio" name="Set1" value="0" checked /><label class="star"for="r1">0</label>
<input id="r2" type="radio" name="Set1" value="1" /><label class="star"for="r2">1</label>
<input id="r3" type="radio" name="Set1" value="2" /><label class="star"for="r3">2</label>
<input id="r4" type="radio" name="Set1" value="3" /><label class="star"for="r4">3</label>
<input id="r5" type="radio" name="Set1" value="4" /><label class="star"for="r5">4</label>
<input id="r6" type="radio" name="Set1" value="5" /><label class=""for="r6">5</label><b>(Highest)</b>
</fieldset>
<fieldset>
<legend id="cri">Clarity</legend>
<b>(Lowest)</b><input id="r7" type="radio" name="Set2" value="0" checked /><label class="star"for="r7">0</label>
<input id="r8" type="radio" name="Set2" value="1" /><label class="star"for="r8">1</label>
<input id="r9" type="radio" name="Set2" value="2" /><label class="star"for="r9">2</label>
<input id="r10" type="radio" name="Set2" value="3" /><label class="star"for="r10">3</label>
<input id="r11" type="radio" name="Set2" value="4" /><label class="star"for="r11">4</label>
<input id="r12" type="radio" name="Set2" value="5" /><label class=""for="r12">5</label><b>(Highest)</b>
</fieldset>
<fieldset>
<legend id="cri">Explanation</legend>
<b>(Lowest)</b><input id="r13" type="radio" name="Set3" value="0" checked /><label class="star" for="r13">0</label>
<input id="r14" type="radio" name="Set3" value="1" /><label class="star"for="r14">1</label>
<input id="r15" type="radio" name="Set3" value="2" /><label class="star"for="r15">2</label>
<input id="r16" type="radio" name="Set3" value="3" /><label class="star"for="r16">3</label>
<input id="r17" type="radio" name="Set3" value="4" /><label class="star"for="r17">4</label>
<input id="r18" type="radio" name="Set3" value="5" /><label class=""for="r18">5</label><b>(Highest)</b>
</fieldset>
<fieldset>
<legend>Relevance of content</legend>
<b>(Lowest)</b><input id="r19" type="radio" name="Set4" value="0" checked /><label class="star"for="r19">0</label>
<input id="r20" type="radio" name="Set4" value="1" /><label class="star"for="r20">1</label>
<input id="r21" type="radio" name="Set4" value="2" /><label class="star"for="r21">2</label>
<input id="r22" type="radio" name="Set4" value="3" /><label class="star"for="r22">3</label>
<input id="r23" type="radio" name="Set4" value="4" /><label class="star"for="r23">4</label>
<input id="r24" type="radio" name="Set4" value="5" /><label class=""for="r24">5</label><b>(Highest)</b>
</fieldset>
<fieldset>
<legend>Overall presentation design</legend>
<b>(Lowest)</b><input id="r25" type="radio" name="Set5" value="0" checked /><label class="star"for="r25">0</label>
<input id="r26" type="radio" name="Set5" value="1" /><label class="star"for="r26">1</label>
<input id="r27" type="radio" name="Set5" value="2" /><label class="star"for="r27">2</label>
<input id="r28" type="radio" name="Set5" value="3" /><label class="star"for="r28">3</label>
<input id="r29" type="radio" name="Set5" value="4" /><label class="star"for="r29">4</label>
<input id="r30" type="radio" name="Set5" value="5" /><label class=""for="r30">5</label><b>(Highest)</b>
</fieldset>
<fieldset>
<legend>Body language</legend>
<b>(Lowest)</b><input id="r31" type="radio" name="Set6" value="0" checked /><label class="star"for="r31">0</label>
<input id="r32" type="radio" name="Set6" value="1" /><label class="star"for="r32">1</label>
<input id="r33" type="radio" name="Set6" value="2" /><label class="star"for="r33">2</label>
<input id="r34" type="radio" name="Set6" value="3" /><label class="star"for="r34">3</label>
<input id="r35" type="radio" name="Set6" value="4" /><label class="star"for="r35">4</label>
<input id="r36" type="radio" name="Set6" value="5" /><label class=""for="r36">5</label><b>(Highest)</b>
</fieldset>
<fieldset>
<legend> Remark </legend>
<input class="remark" name="remark" type="text" size="50" style="height: 25px;"> 
</fieldset>

<div class="total">
Total <input id="total" type="text" name="total" value="" />/30
<input type="submit" id="myBtn" value="Submit form" > </input>

<!-- The Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p align="center">Your form has been submitted</p>
          <p align="center">Do you want to assess again?</p>
        </div>
        <div class="modal-footer">
        <a href="https://presentapp.site/process/assessment.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Yes</a>
        <a href="https://presentapp.site/" class="btn btn-primary btn-lg " role="button" aria-pressed="true">No</a>

        </div>
      </div>
      
    </div>
  </div>
  
</div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  <script>
$(document).ready(function(){
   $("#myModal").modal();
});
//made by csandreas1 for Stackoverflow
</script>
</script>
 <?php include("../endbar.php"); ?>
</body>
</html>