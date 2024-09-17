<?php
include_once('../dbconn.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['is_login'])) {
    $stdLoginEmail = $_SESSION['stdLoginEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
}
if (isset($stdLoginEmail)) {
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stdLoginEmail'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font awesome css -->
    <link rel="stylesheet" href="../css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet" />

    <!-- Custom Style -->
    <link rel="stylesheet" href="../css/profile.css" />

</head>

<body>
    <!--Start Navbar-->
    <nav class="navbar navbar-expand-lg pl-5 fixed-top">
        <a class="navbar-brand" href="../index.php">LearningZone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-between;">
            <ul class="navbar-nav custom-nav">
                <li class="nav-item custom-nav-item active">
                    <a class="nav-link" href="../index.php">Home </a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="../courses.php">Courses</a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#footer">About</a>
                </li>
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION['is_login'])) {
                    echo '<li class="nav-item custom-nav-item ">
                        <a class="nav-link" href="../student/student_profile.php">MyProfile</a>
                    </li><li class="nav-item custom-nav-item ">
                        <a class="nav-link" href="../logout.php">Logout</a>
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
            <form class="form-inline" action="../searchcourse.php" method="get">
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


    <!-- navbar end -->
    <!--start side bar -->
    <!-- <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row"> -->
    <nav class="alert col-sm-2 sidebar py-5 d-print-none">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <img class="img-thumbnail rounded-circle" src="<?php echo $stu_img ?>" alt="Not Found">
                    </img>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="student_profile.php">
                        <i class="fas fa-user"></i>
                        Profile <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myCourse.php">
                        <i class="fa-solid fa-book"></i>
                        My Courses
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stufeedback.php">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Feedback
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studentChangePass.php">
                        <i class="fas fa-key"></i>
                        Change Password
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>

            </ul>

        </div>
    </nav>
    <!--end side bar -->