<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../dbconn.php');

if (isset($_SESSION['is_login'])) {
    $stdLoginEmail = $_SESSION['stdLoginEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
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
    <link rel="stylesheet" href="../css/style.css" />

</head>

<body>
    <!--Start Navbar-->
    <nav class="navbar navbar-expand-lg pl-5 fixed-top">
        <a class="navbar-brand" href="../index.php">LearningZone</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
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
        </div>
    </nav>
    <!--End Navbar-->


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8" style="padding-top: 100px;">
                <div style="width:100%;">
                    <video id="videoarea" controls src=""></video>
                </div>

                <div class="container-fluid">
                    <h3 class="titleStyle" id="videotitle"> Welcome to E-learning </h3><br>
                    <a class="btn btnCol" href="./mycourse.php">View Your All Courses</a>
                </div>
            </div>

            <div class="col-4 border-right sidebar">
                <h3 class="text-center titleStyle m-3" style="padding-top: 100px;">lessons</h3>
                <ul id="playlist" class="nav flex-column" style="border: groove;">
                    <?php
                    if (isset($_GET['course_id'])) {
                        $course_id = $_GET['course_id'];
                        $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="nav-item border-bottom py-3 lessonlist" vidname="'. $row['lesson_name'] .'" movieurl="' . strval($row["lesson_link"]) . '">' . $row['lesson_name'] . '</li>';
                            }
                        }
                    }
                    ?>

                </ul>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script src="../js/custom.js"></script>

    <?php
    include('./stuInclude/footer.php');
    ?>