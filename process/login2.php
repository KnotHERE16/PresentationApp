<?php
mysqli_report(MYSQLI_REPORT_STRICT); // enable exceptions
session_start();
require_once "Sqlconnect.php";

$studentid= $_POST['studentid'];
$email = $_POST['email'];
$password = $_POST['password'];



$option =$_REQUEST["option"];
$_SESSION['loginstatus'] = 0;
if($option == "1")  //if student option is chosen
{
	$query= "SELECT * FROM student where studentid ='$studentid'"; //choose from the student table
	$result= mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count==1) //if the result exists in student table
	{	
		while ($row = mysqli_fetch_assoc($result))
		{
			$hash = $row['password'];
			if (password_verify($password, $hash)){ 
		        $_SESSION['loginstatus'] = 1;
				$_SESSION['studentid'] = $studentid;
				header('Location: ../index.php');
			}
			else{
				header('Location: ../loginPassErr.php');
			}
		}
	}
	else 
	{
		header('Location: ../loginIDError.php');
	}
}

if ($option == "2") // if other option is chosen
{
	$query2= "SELECT * FROM staff where email ='$email'"; //choose from the staff table
	$result2= mysqli_query($conn,$query2);
	$count2 = mysqli_num_rows($result2);
	if($count2==1) //if the result exists in staff table
	{
		while ($row = mysqli_fetch_assoc($result2)){
			$hash = $row['password'];
			$staffid = $row['staffid'];
			if (password_verify($password, $hash)){
			    $_SESSION['loginstatus'] = 1;
		        $_SESSION['staffid'] = $staffid;
				$_SESSION['email'] = $email;
				header('Location: ../index.php');
			}
			else{
				header('Location: ../loginPassErr.php');
			}
		}
	}
	else
	{
		$query3 = "SELECT * FROM guest where email ='$email'"; //choose from the guest table
		$result3 = mysqli_query($conn,$query3);
		$count3 = mysqli_num_rows($result3);
		if ($count3 == 1)   //if the result exists in guest table
		{
			while ($row = mysqli_fetch_assoc($result3)){
				$hash = $row['password'];
				$guestid = $row['guestid'];
				if (password_verify($password, $hash)){
				    $_SESSION['loginstatus'] = 1;
				    $_SESSION['guestid'] = $guestid;
					$_SESSION['email'] = $email;
				header('Location: ../index.php');
				}
				else{
					header('Location: ../loginPassErr.php');
				}
			}
		}
		else {
			header('Location: ../loginEmailErr.php');
		}
	}
	
}
	
	
?>