<?php
require_once "Sqlconnect.php";


$name = $_POST["name"];
$studentid = $_POST["studentid"];
$schoolid = $_POST["schoolid"];
$classcode = $_POST["classcode"];
$course = $_POST["course"];
$affiliation = $_POST["affiliation"];
$email = $_POST["email"];
$password = $_POST["password"];
$hash = password_hash($password, PASSWORD_DEFAULT);
$option = $_REQUEST["option"];


if ($option == "1") //if student option is chosen
{
    if (($studentid == " ") || ($studentid == null)) //check student ID input is empty or not!
    {
        header('Location: ../registerSidEmpty.php');
    }
    else if (strlen($studentid) != 8) //check student ID is 8 numbers or not!
    {
        header('Location: ../registerSidnot8.php');
    }
    else
    {
	$query = "SELECT * FROM student WHERE studentid = '$studentid'"; //choose from the student table
	$result= mysqli_query ($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>=1) // if the result is already exits, go to the error page
	{
		header('Location: ../registerSidErr.php');
	}
	else{
		$sql = "INSERT INTO student (name, studentid, course, email, password)
		VALUES ('$name','$studentid','$course','$email','$hash')"; //insert values into student table.
		if ($conn->query($sql) === TRUE) 
		{
			header('Location: ../index.php');
		}
		else
		{
			header('Location: ../registerInvalid.php');
		}
	}	
}
}

if ($option == "2") //if staff option is chosen
{
    if (($schoolid == " ") || ($schoolid == null)) //check staff ID is empty or not!
    {
        header('Location: ../registerEmptyStaff.php');
    }
    else
    {
	$query = "SELECT * FROM staff WHERE email = '$email'"; //choose from the staff id 
	$result= mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>=1) // if the result already exists, go to error page
	{
		header('Location: ../registerEmailErr.php');
	}
	else{
	    $sql = "INSERT INTO staff (name, schoolid, email, password)
	    VALUES ('$name','$schoolid','$email','$hash')"; //insert values into staff table
	
	    if ($conn->query($sql) === TRUE) 
	    {
		    header('Location: ../index.php');
	    } else {
		    header('Location: ../registerInvalid.php');
	    }
    }
}
}


if ($option == "3") //if guest option is chosen
{
    if (($affiliation == " ") || ($affiliation == null)) // check affiliation input in empty or not!
    {
        header('Location: ../registerEmptyAff.php');
    }
    else
    {
	$query = "SELECT * FROM guest WHERE email = '$email'"; //choose from the guest table
	$result= mysqli_query ($conn,$query);
	$count = mysqli_num_rows($result);
	if($count>=1) // if the result already exists, go to error page
	{
		header('Location: ../registerEmailErr.php');
	}
	else{
		
    	$sql = "INSERT INTO guest (name, affiliation, email, password)
	    VALUES ('$name','$affiliation','$email','$hash')"; //insert values into guest table
	    if ($conn->query($sql) === TRUE) 
	    {
		    header('Location: ../index.php');
    	} else {
	    	header('Location: ../registerInvalid.php');
	    }
    }
}
}

 
$conn->close();

?>