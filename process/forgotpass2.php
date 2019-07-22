<?php
session_start();
require_once "Sqlconnect.php";
$email = $_POST['email'];
	
$query= "SELECT * FROM student where email ='$email'"; //choose from the student table
$result= mysqli_query($conn,$query);
$count = mysqli_num_rows($result);
$str = "0123456789qwertyuioplkjhgfdsazxcvbnm";
$str = str_shuffle($str);
$str = substr($str, 0, 10);
$url = "http://presentapp.site/resetPassword.php?token=$str&email=$email";
if($count==1)   //if the result exists in student table
{
	mail($email, "Reset Password", "To reset your password, please visit this: $url", "From: support@presentapp.site\r\n");
	$conn->query("UPDATE student SET token ='$str' WHERE email='$email'");
	$_SESSION['email']=$email;
	$_SESSION['token']=$token;
	header('Location: ../forgotpassSent.php');
}
else{
	$query2= "SELECT * FROM staff where email ='$email'";   //choose from the staff table
	$result2= mysqli_query($conn,$query2);
	$count2 = mysqli_num_rows($result2);
	if($count2==1)  //if the result exists in staff table
	{
		mail($email, "Reset Password", "To reset your password, please visit this: $url", "From: support@presentapp.site\r\n");
	
	
		$conn->query("UPDATE staff SET token = '$str' WHERE email='$email'");
		$_SESSION['email']=$email;
	    $_SESSION['token']=$token;
		header('Location: ../forgotpassSent.php');
	}
	else
	{
		$query3 = "SELECT * FROM guest where email ='$email'";  //choose from the guest table
		$result3 = mysqli_query($conn,$query3);
		$count3 = mysqli_num_rows($result3);
		if($count3 == 1) //if the result exists in guest table
		{
	
		mail($email, "Reset Password", "To reset your password, please visit this: $url", "From: support@presentapp.site\r\n");
	    
		$conn->query("UPDATE guest SET token = '$str' WHERE email='$email'");
		$_SESSION['email']=$email;
		$_SESSION['token']=$token;
		header('Location: ../forgotpassSent.php');
		}
		else {
			header('Location: ../forgotpassfail.php');
		}
	}
}

?>