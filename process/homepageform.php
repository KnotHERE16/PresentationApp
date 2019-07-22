<?php
session_start();
include ("Sqlconnect.php");
ob_start();
include("../index.php");
ob_end_clean();

header("Location: ../index.php");
if (isset($_POST["yesbtn"])) {
    $boxindex=$_POST["yesbtn"];
}
    if (isset($_POST["hiddenbox"])) {
        $whicharray=$_POST["hiddenbox"];
  
        if ($whicharray == "1") {
            $in_schedule=$todayarray['scheduleID'][$boxindex];
        } else {
            $in_schedule=$futurearray['scheduleID'][$boxindex];
        }
    }
if (isset($_POST["yeslink"]))
{
    $in_schedule=$_POST["yeslink"];
}

  if( isset( $_SESSION['studentid']))
  {
      $nowuser = $_SESSION['studentid'];
      $sql = "INSERT into `assessor` (`scheduleID`,`studentid`) VALUES ('$in_schedule','$nowuser')";
 }
  else if( isset( $_SESSION['staffid']))
  {
      $nowuser = $_SESSION['staffid'];
      $sql = "INSERT into `assessor` (`scheduleID`,`staffid`) VALUES ('$in_schedule','$nowuser')";
  }
  else if( isset( $_SESSION['guestid']))
  {
      $nowuser = $_SESSION['guestid'];
      $sql = "INSERT into `assessor` (`scheduleID`,`guestid`) VALUES ('$in_schedule','$nowuser')";
  }
  
    if ($conn->query($sql) === true) {
        
        echo "You are now the assessor <br> ";
    } else {
?>
        <script> alert('<?php echo "Error: " . $sql . "<br>" . $conn->error;?>') </script>;
        <?php
    }

   
?>