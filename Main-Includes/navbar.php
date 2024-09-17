<!--Start Navbar-->
<nav class="navbar navbar-expand-lg pl-5 fixed-top">
    <a class="navbar-brand" href="./index.php">LearningZone</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-between;">
        <ul class="navbar-nav custom-nav">
            <li class="nav-item custom-nav-item active">
                <a class="nav-link" href="./index.php">Home </a>
            </li>
            <li class="nav-item custom-nav-item ">
                <a class="nav-link" href="./courses.php">Courses</a>
            </li>
            <li class="nav-item custom-nav-item ">
                <a class="nav-link" href="#footer">About</a>
            </li>
            <?php
            session_start();
            if (isset($_SESSION['is_login'])) {
                echo '<li class="nav-item custom-nav-item ">
                        <a class="nav-link" href="./student/student_profile.php">MyProfile</a>
                    </li><li class="nav-item custom-nav-item ">
                        <a class="nav-link" href="./logout.php">Logout</a>
                    </li>';
            } else {
                echo '<li class="nav-item custom-nav-item ">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#stdLoginModal">Login</a>
                    </li>
                    <li class="nav-item custom-nav-item ">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#stdRegiModal">Signup</a>
                    </li>';
            }
            ?>

            <li class="nav-item custom-nav-item ">
                <a class="nav-link" href="#contact">Contact us</a>
            </li>
        </ul>
        <form class="form-inline" action="./searchcourse.php" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <div class="input-group-append">
                    <button class="btn btnCol" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</nav>
<!--End Navbar-->