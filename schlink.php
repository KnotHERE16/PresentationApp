<?php
session_start();
include ("process/Sqlconnect.php"); //connect sql database

function aly_register($nowuser, $schid) //function to check register
{
    global $conn;
    $schedule= $schid;
    if (isset($_SESSION['studentid'])) {
        $sql = "SELECT * FROM `assessor` WHERE `scheduleID`= $schedule AND `studentid` = $nowuser";
    } elseif (isset($_SESSION['staffid'])) {
        $sql = "SELECT * FROM `assessor` WHERE `scheduleID`= $schedule AND `staffid` = $nowuser";
    } elseif (isset($_SESSION['guestid'])) {
        $sql = "SELECT * FROM `assessor` WHERE `scheduleID`= $schedule AND `guestid` = $nowuser";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return 1;
    } else {
        return 0;
    }
}

function nowpresent($sdate, $stime) 
{
    $newtime = strtotime('+2 hour', strtotime($stime));
    $newboxtime = strtotime($stime);
    if ($sdate == date("Y-m-d")) {
        if ((time() >= $newboxtime) and (time() <= $newtime)) {
            return 1; //true
        } else {
            return 0; //false
        }
    } else {
        return 0;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
</head>

<body>
    <?php
if (isset($_SESSION['studentid'])) {
    include("menubar/menubarStudent.php");
    $userid=$_SESSION['studentid'];
} elseif (isset($_SESSION['guestid'])) {
    include("menubar/menubarStudent.php");
    $userid=$_SESSION['guestid'];
} elseif (isset($_SESSION['staffid'])) {
    include("menubar/menubar.php");
    $userid=$_SESSION['staffid'];
} else {
    include("menubar/menubarNotLogin.php");
}

$schid = $_GET['id'];
$sql = "SELECT * FROM `schedule` where `scheduleid`= $schid";
$result = $conn->query($sql);
$row = $result->fetch_assoc();?>

<table class="table">
    <tbody>
        <tr>
            <td>Date</td>
            <td> --- </td>
            <td> </td>
            <td> </td>
            <td><b style="color:green"><?php echo date('d-M-Y', strtotime($row["date"]))?></b></td>
        </tr>
        <tr>
            <td>Time</td>
            <td> --- </td>
            <td> </td>
            <td> </td>
            <td><b style="color:green"><?php echo date('h:ia', strtotime($row["time"]))?></b></td>
        </tr>
        <tr>
            <td>Venue</td>
            <td> --- </td>
            <td> </td>
            <td> </td>
            <td><b style="color:green"><?php echo $row["venue"]?></b> </td>
        </tr>
        <tr>
            <td>Module</td>
            <td> --- </td>
            <td> </td>
            <td> </td>
            <td><b style="color:green"><?php echo $row["module"]?> </b></td>
        </tr>
        <tr>
            <td>Presenter</td>
            <td> --- </td>
            <td> </td>
            <td> </td>
            <td><b style="color:green"><?php echo $row["presenter"]?></b> </td>
        </tr>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        
    </tbody>
    
</table>


<?php
$schdate = $row["date"];
$schtime = $row["time"];
?>


    <div class="container">
        <div id="needlog">
            <p> You need to log in first to sign up for this session </p>
        </div>

        <div id="reg_ass" style="display:none">
            <p style="font-size:150%;text-align:center;"> Do you want to become assessor for this session? </p>
            <form method="POST" action="homepageform.php">
                <button type="submit" id="yeslinkid" name="yeslink" class="btn btn-primary" style="margin-left:46%;font-size:120%" value="<?php echo $schid;?>";>Yes</button>
            </form>
        </div>

        <div id="aly_ass" style="display:none">
            <p>You have already register to be assessor for this session</p>
        </div>

        <div id="OTP" style="display:none">
            <p>Please enter One Time Password for this session</p>
            <form id="otpform" action="otpform.php" method="POST">
                <input type='hidden' id="otpboxid" name="otplinkname" value="<?php echo $schid;?>";>
                <input type='text' id="otpid" name="otpname" />
                <button type="submit" id="otpbtn" name="otpbtnname">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    var logins = "<?php echo $_SESSION['loginstatus'];?>";
    if(logins == "1"){
        div0 = document.getElementById('needlog');
        div1 = document.getElementById('reg_ass');
        div2 = document.getElementById('aly_ass');
        div3 = document.getElementById('OTP');
        var alyreg = "<?php echo aly_register($userid, $schid);?>";
        var nowpre = "<?php echo nowpresent($schdate, $schtime);?>";

        if (alyreg == 1) {
            if (nowpre == 1) {
                div0.style.display = "none";
                div1.style.display = "none";
                div2.style.display = "none";
                div3.style.display = "block";
            } else {
                div0.style.display = "none";
                div1.style.display = "none";
                div2.style.display = "block";
                div3.style.display = "none";
            }
        } else {
            div0.style.display = "none";
            div1.style.display = "block";
            div2.style.display = "none";
            div3.style.display = "none";


        }
    }
    
function goassess()
{
var f =document.createElement("form");
f.method ="POST";
f.action ="assessment.php";


var element1 = document.createElement("input");
element1.type = 'hidden';
element1.name = "successname";
element1.value = "<?php echo $schid;?>";
f.appendChild(element1);
document.body.appendChild(f);
f.submit();
}

$("#otpform").submit(function (event) {
    event.preventDefault();
    var form = $(this);
    var url = "otpform.php";
    var formData = {
        'otpname': $('input[name=otpname]').val(),
        'otplinkname': $('input[name=otplinkname').val(),

    };

    $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function (data) {
 if (data == "true") {
                goassess();
            }
            else {
                alert("WRONG ONE TIME PASSWORD");
            }
        }
    });
});
    </script>
</body>

</html>