 

    <h1> TODAY SCHEDULE </h1>
    <div class="schedule_container">
        <?php
        function already_register($index, $nowuser, $dataarray)
        {
            global $conn;
            $schedule= $dataarray[$index];
            if( isset( $_SESSION['studentid']))
            {              
            $sql = "SELECT * FROM `assessor` WHERE `scheduleID`= $schedule AND `studentid` = $nowuser";
           }
            else if( isset( $_SESSION['staffid']))
            {
            $sql = "SELECT * FROM `assessor` WHERE `scheduleID`= $schedule AND `staffid` = $nowuser";
            }
            else if( isset( $_SESSION['guestid']))
            {             
            $sql = "SELECT * FROM `assessor` WHERE `scheduleID`= $schedule AND `guestid` = $nowuser";
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                return 1;
            } else {
                return 0;
            }
        }

        function presenting($index, $boxdate, $boxtime)
        {
            $newtime = strtotime('+2 hour', strtotime($boxtime[$index]));
            $newboxtime = strtotime($boxtime[$index]);
            if ($boxdate[$index] == date("Y-m-d")) {
                if ((time() >= $newboxtime) and (time() <= $newtime)) {
                    return 2; //true
                } else {
                    return 4; //false
                }
            } else {
                return 4;
            }
        }

        $sql = "SELECT `scheduleID`,`date`, `time`,`venue`,`module`,`presenter` FROM `todayview`";
        $result = $conn->query($sql);
        $x=0; //array index data-box value
        $todayarray= array();
           
    while ($row = $result->fetch_assoc()) {
        ?>

        <div class="boxed" id="box<?php echo $x ?>" data-box="<?php echo $x ?>" data-date="today" onclick="sdisplay(this)">
            <?php
            echo date('d-M-Y', strtotime($row["date"]))."<br>".date('h:ia', strtotime($row["time"]))."<br>".$row["venue"]."<br>".$row["module"]."<br>".$row["presenter"]."<br>";

        $todayarray['scheduleID'][] = $row["scheduleID"];
        $todayarray['date'][]=$row["date"];
        $todayarray['time'][]=$row["time"]; 
        ?>        
        </div>

        <script type="text/javascript">
            document.getElementById("box<?php echo $x?>").setAttribute("data-assess","<?php echo already_register($x, $nowuser, $todayarray['scheduleID'])?>");
            document.getElementById("box<?php echo $x?>").setAttribute("data-now","<?php echo presenting($x, $todayarray['date'], $todayarray['time'])?>");
        </script>

        <?php
       $x+=1;
    }
    ?>
    
    </div>

    <h1> FUTURE SCHEDULE </h1>
    <div class="schedule_container">
        <?php
         
        $sql = "SELECT `scheduleID`,`date`, `time`,`venue`,`module`,`presenter` FROM `futureview`";
        $result = $conn->query($sql);
        $y=0;
        $futurearray=array();
        
        while ($row = $result->fetch_assoc()) {
            ?>
        <div class="boxed" id="fbox<?php echo $y ?>" data-box="<?php echo $y ?>" data-date="future" onclick="sdisplay(this)">
            <?php
              echo date('d-M-Y', strtotime($row["date"]))."<br>".date('h:ia', strtotime($row["time"]))."<br>".$row["venue"]."<br>".$row["module"]."<br>".$row["presenter"]."<br>";
            $futurearray['scheduleID'][] = $row["scheduleID"]; ?>
        </div> 

        <script type="text/javascript">
            document.getElementById("fbox<?php echo $y?>").setAttribute("data-assess","<?php echo already_register($y, $nowuser, $futurearray['scheduleID'])?>");
        </script>


        <?php
        
        $y+=1;
        }
        ?>

    </div>
<!-- POP UP BOX FOR REGISTERTING TO BECOME ASSESSOR -->
    <div id="modalID" class="modal">
        <div class="modal_content">
            <span class="close">&times;</span>
            <div class="modal-body">
            <p id="demo">Do you want to become assessor for this session?</p>
</div>
<div class="modal-footer">
            <form method="POST" action="process/homepageform.php">
                <input type='hidden' id="hiddenid" name="hiddenbox" />
                <button type="submit" class="btn btn-success" id=yesbtnid name=yesbtn >Yes</button>
            </form>
            <button class="btn btn-danger" id=nobtn onclick="nobutton()">No</button>
</div>
        </div>
    </div>

<!-- POP UP BOX FOR ALREADY REGISTER ASSESSOR -->
    <div id="modal_assessID" class="modal">
        <div class="modal_content">
            <span class="close">&times;</span>
            <p id="demos">You have already register to be assessor for this session</p>

            <button class="btn btn-danger" id=backbtn onclick="nobutton()">Back</button>

        </div>
    </div>

<!--INPUT OTP -->
    <div id="modal_OTPid" class="modal">
        <div class="modal_content">
            <span class="close">&times;</span>
            <p id="demos">Please enter One Time Password for this session</p>

            <form id="otpform" action="process/otpform.php" method="POST">
            <input type='hidden' id="otpboxid" name="otpboxname">
            <input type='text' id="otpid" name="otpname" />
            <button class="btn btn-success" type="submit" id="otpbtn" name="otpbtnname">Submit</button>
            </form> 
        </div>
    </div>

    
     
     
    
    

