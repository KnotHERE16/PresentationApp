<h1> TODAY SCHEDULE </h1>
    <div class="schedule_container">
        <?php
      
        $sql = "SELECT `scheduleID`,`date`, `time`,`venue`,`module`,`presenter` FROM `todayview`";
        $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        ?>

        <div class="boxed">
            <?php
            echo date('d-M-Y', strtotime($row["date"]))."<br>".date('h:ia', strtotime($row["time"]))."<br>".$row["venue"]."<br>".$row["module"]."<br>".$row["presenter"]."<br>";
            ?>        
        </div>
        <?php
     }
    ?>
    
    </div>

    <h1> FUTURE SCHEDULE </h1>
    <div class="schedule_container">
        <?php
         
        $sql = "SELECT `scheduleID`,`date`, `time`,`venue`,`module`,`presenter` FROM `futureview`";
        $result = $conn->query($sql);       
        while ($row = $result->fetch_assoc()) {
            ?>
        <div class="boxed">
            <?php
           echo date('d-M-Y', strtotime($row["date"]))."<br>".date('h:ia', strtotime($row["time"]))."<br>".$row["venue"]."<br>".$row["module"]."<br>".$row["presenter"]."<br>";
            ?>
        </div> 
    <?php
        }
        ?>
    </div>    