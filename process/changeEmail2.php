<?php
session_start();
$condition = 0;
include("Sqlconnect.php");
if( isset( $_SESSION['studentid']))
{
    $name = $_SESSION['studentid'];
    $condition = 1;
}
else if( isset( $_SESSION['staffid']))
{
    $name = $_SESSION['schoolid'];
    $condition = 2;
    $query = $_SESSION['staffid'];
}
else
{
    $name = $_SESSION['guestid'];
    $condition = 3;
    $filter = $_SESSION['guestid'];
}

$newEmail = $_POST['newEmail'];
    
    if($condition == 1)
        {
            $sql = mysqli_query($conn, "UPDATE student
                    SET email = '$newEmail'
                    WHERE studentid ='$name'") or die($conn->error);
        }
        else if ($condition == 2)
        {
            $sql = mysqli_query($conn, "UPDATE staff
                    SET email = '$newEmail'
                    WHERE staffid ='$query'") or die($conn->error);
        }
        else if ($condition == 3)
        {
            $sql = mysqli_query($conn, "UPDATE guest
                    SET email = '$newEmail'
                    WHERE guestid ='$filter'") or die($conn->error);
        }
        
         if($conn->query($sql) === TRUE)
        {
            // "Successful update to database";
        }
        else
            echo "";
            
            
  if($condition == 1)
{
echo "<script type='text/javascript'>";
echo "window.location.href = '../profile.php';";
echo "</script>";
}
else if($condition == 2)
{
echo "<script type='text/javascript'>";
echo "window.location.href = '../profileAdmin.php';";
echo "</script>";
}
else if($condition == 3)
{
echo "<script type='text/javascript'>";
echo "window.location.href = '../profile.php';";
echo "</script>"; 
    
}
?>