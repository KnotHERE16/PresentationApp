<?php
session_start();
error_reporting(0);
include("Sqlconnect.php");
$condition = 0;
$target_dir = "../images/"; //Target Directory
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//File
if( isset( $_SESSION['studentid']))//ID check
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
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        // "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $Message = "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $Message = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $Message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

$result = glob ("/home2/kelvinlee16/public_html/images/$name.*");
// Check if file already exists
if (count($result) > 0) {
    unlink("../images/" .$name. ".jpg");
    unlink("../images/" .$name. ".png");
    unlink("../images/" .$name. ".jpeg");
    unlink("../images/" .$name. ".gif");
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    // "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $name.".".$imageFileType)) 
    {
        $Message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $image = $name.".".$imageFileType;
        if($condition == 1)
        {
            $sql = mysqli_query($conn, "UPDATE student
                    SET image = '$image'
                    WHERE studentid ='$name'") or die($conn->error);
        }
        else if ($condition == 2)
        {
            $sql = mysqli_query($conn, "UPDATE staff
                    SET image = '$image'
                    WHERE staffid ='$query'") or die($conn->error);
        }
        else if ($condition == 3)
        {
            $sql = mysqli_query($conn, "UPDATE guest
                    SET image = '$image'
                    WHERE guestid ='$filter'") or die($conn->error);
        }
        
        if($conn->query($sql) === TRUE)
        {
            // "Successful update to database";
        }
        else
            echo "";
    } 
    else 
    {
        echo "Sorry, there was an error uploading your file.";
    }
}
$_SESSION["imgUpload"] = 1;
$_SESSION["imgMessage"] = $Message;

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