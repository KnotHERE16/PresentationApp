<?php

session_start();
if(isset($_SESSION['email']))
{
    $email = $_SESSION['email'];
}
	require_once"Sqlconnect.php";
	
    
	$newpass = $_POST["newpass"];
	$newhash = password_hash($newpass, PASSWORD_DEFAULT);
	
	$query= "SELECT * FROM student where email ='$email'"; //choose from the student table
	$result= mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if ($count == 1) //if the result exists in student table
	{
		$conn->query("UPDATE student SET password='$newhash' WHERE email='$email'");
		header('Location: ../login.php');
		
	}
	else {
		$query2= "SELECT * FROM staff where email ='$email'"; //choose from the staff table
		$result2= mysqli_query($conn,$query2);
		$count2 = mysqli_num_rows($result2);
		if ($count2 == 1) // if the result exists in the staff table
		{
			$conn->query("UPDATE staff SET password='$newhash' WHERE email='$email'");
			header('Location: ../login.php');
		}
		else {
			$query3= "SELECT * FROM guest where email ='$email'"; //choose from the guest table
			$result3= mysqli_query($conn,$query3);
			$count3 = mysqli_num_rows($result3);
			if ($count3 == 1) //if the result exist in the guest table
			{
				$conn->query("UPDATE guest SET password='$newhash' WHERE email='$email'");
				header('Location: ../login.php');
			}
			else
			{
			    header('Location: ../resetPasswordErr.php');
			}
		}
		
	}
session_destroy();

?>