<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  

</head>
<body>

<?php 
include("process/Sqlconnect.php");
if( isset( $_SESSION['studentid']))
{
    $user = $_SESSION['studentid'];
    include("menubar/menubarStudent.php");
}
else if( isset( $_SESSION['staffid']))
{
    $user = $_SESSION['staffid'];
    include("menubar/menubar.php");
}
else if( isset( $_SESSION['guestid']))
{
    $user = $_SESSION['guestid'];
    include("menubar/menubarStudent.php");
}
else
{
    include("menubar/menubarNotLogin.php");
}
?> 

    <form action="process/SchedulingProcess.php" method="POST" target="homepage.php">
        <div class="container">
            <h1 style="margin-left:35%">Scheduling</h1>
            <p style="font-size:20px">Fill in this form to schedule a presentation</p>
            
            
            

                <label for="date"><b>Date</b></label>
                <input type="date" name="date" id="dateID" class="form-control" required> 
                <script>
                        var today = new Date();
                        var dd = today.getDate();
                        var mm = today.getMonth() + 1; //January is 0!
                        var yyyy = today.getFullYear();
                        if (dd < 10) {
                            dd = '0' + dd
                        }
                        if (mm < 10) {
                            mm = '0' + mm
                        }
                    
                        today = yyyy + '-' + mm + '-' + dd;
                        document.getElementById("dateID").setAttribute("value",today);
                        document.getElementById("dateID").setAttribute("min", today);
                        
                    </script>
            

           
                
                <label for="time"><b>Time</b></label><br>
                <input type="time" name="time" class="form-control" required> 
                


            
                <label for="venue" ><b>Venue</b></label>
                <input type="text" placeholder="do not include space" name="venue" class="form-control" oninput="this.value = this.value.toUpperCase()" required pattern="[0-9a-zA-Z]*" />
            

            
                <label for="module" ><b>Module</b></label>
                <input type="text" placeholder="do not include space" name="module" class="form-control" oninput="this.value = this.value.toUpperCase()" required pattern="[0-9a-zA-Z]*" />
           

            
                <label for="presenter"><b>Presenter</b></label>
                <input type="text" class="form-control" placeholder="optional" name="presenter"> <br>
            

            <div>
                <input type="submit" value="Submit" name="submit" class="btn btn-primary" style="margin-left:40%"> <br><br>
            </div>
            
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- ENDBAR -->
<?php include("endbar.php"); ?>
</body>

</html>