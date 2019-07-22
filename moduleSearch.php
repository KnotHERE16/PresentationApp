<?php //THIS CODE USES THE SAME EXACT ALGORITHMS AS THE STUDENT SEARCH FUNCTION
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
$phparray = array();
$x = 0; //array index data-box value
$sql = "SELECT DISTINCT module FROM schedule";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("studentList");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
<title>PresentApp</title>
<link href="css/moduleSearch.css" rel="stylesheet" type="text/css">
<!-- META FOR BOOTSTRAP CSS -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
</head>

<body>
<div class="container">
<!-- SEARCH BAR-->
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for modules..">
<!-- MODULE/DISPLAY MODULES USING WHILE LOOP -->	

<div class="students">
	<ul id="studentList">
	<form action="moduleProfile.php" method="post" id="form1" name="form1">
	<input type="hidden" id="hiddenVal" name="hiddenVal" />
	<?php
	while ($row = $result->fetch_assoc())
	{//DISPLAY MODULE INFO
		?>
	<li><a><div class="studentInfo" data-box="<?php echo $x ?>" onclick="sdisplay(this)" style="text-align: center;">
	<?php echo $row ["module"];
		$phparray[] = $row["module"];
		$x+=1;
	?>
	</div></a></li>
	<?php
	}
	?>
	</form>
</ul>


</div>
</div>
<?php include("endbar.php"); ?>
<script>
STUD_NUM = <?php echo json_encode($phparray); ?>;
</script>
<!-- RETURN BOXVALUE INDEX -->
<script type="text/javascript">
var boxvalue;
var modal;
var STUD_NUM

function sdisplay(boxdata)//RETRIEVE BOX VALUE
{
	boxvalue = boxdata.getAttribute("data-box");
	var num = boxvalue;
	var studnum = STUD_NUM;
	var sliced = studnum[num]
	document.getElementById("hiddenVal").value = sliced;
	document.form1.submit();
}
</script>

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>