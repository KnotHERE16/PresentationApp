<nav class="navbar navbar-expand-md bg-danger navbar-dark">
    <a class="navbar-brand" href="../index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav nav-fill w-100">
             <li class="nav-item active">
                <a class="nav-link" href="profile.php">Profile</a>
            </li>
             <li class="nav-item active">
                <div class="nav-link">
                <?php 
                if(isset($_SESSION["studentid"]))
                    echo "Student ". $_SESSION["studentid"]. " "; 
                else
                    echo "Guest ". $_SESSION["guestid"]. " "; 
                ?>
                <a href="signout.php" style="color:white;">[Sign out]</a>
                </div>
            </li>
        </ul>
    </div>
</nav>