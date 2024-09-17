<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearningZone</title>

    <!-- Include CSS -->
    <?php
    include("./dbconn.php");
    include("./Main-Includes/addcss.php");
    ?>
</head>

<body>

    <!-- Include Navbar -->
    <?php
    include("./Main-Includes/navbar.php");

    ?>


    <!-- start back video -->
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="video/BackgroundVid.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
            <div class="center-vid-content">
                <h1 class="my-content titleStyle">Welcome to LearningZone</h1>
                <p class="my-content">Experience a new way of learning</p>

                <?php
                if (!isset($_SESSION['is_login'])) {
                    echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#stdRegiModal">Get Started</a>';
                } else {
                    echo '<a href="student/student_profile.php"><button class="btn mt-3 btnCol">My Profile </button> </a>';
                }
                ?>

            </div>
        </div>
    </div>
    <!-- end back video -->

    <!-- strat text bannner-->
    <div class="container-fluid txt-banner">
        <div class="row button-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Cources</h5>
            </div>

            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i> Expert Instuctors</h5>
            </div>

            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fa-solid fa-indian-rupee-sign mr-3"></i> Money Back Guarantee*</h5>
            </div>
        </div>
    </div>
    <!-- end text bannner-->

    <!--start cources popular-->
    <div class="container mt-5">
        <h1 class="text-center titleStyle">Popular Courses</h1>


        <div class="card-deck mt-4">

            <?php
            $sql = "SELECT * FROM course LIMIT 3";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    echo '
                            <!--card start-->
                            <div class="cardStyle">
                                <div style="border-style: ridge;">
                                <a href="coursedetails.php?course_id=' . $course_id . '">
                                    <img src="image/courseimg/' . $row['course_img'] . ' " class="card-img-top" alt="No Img"/>
                                    <div class="card-body" style="height: 135px; overflow: hidden;">
                                        <p class="card-title font-weight-bold"> ' . $row['course_name'] . '</p>
                                        <small class="card-text"> ' . $row['course_desc'] . ' </small>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">Price :<small><del>&#8377  ' . $row['course_original_price'] . ' </del></small></p>
                                        <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . ' </span>
                                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '">Enroll</a>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <!--card end-->
                        ';
                }
            }

            ?>



            <!--start more cources -->
            <div class="text-center m-4 w-100">
                <a class="btn btnCol" href="./courses.php">View all Courses</a>
            </div>
            <!--end more cources Popular -->

        </div>
    </div>
    <!--end cources popular-->

    <!--start cources New-->
    <div class="container mt-5">
        <h1 class="text-center titleStyle">New Courses</h1>

        <!--card 2 start-->
        <div class="card-deck mt-4">

            <?php
            $sql = "SELECT * FROM course ORDER BY course_id DESC LIMIT 3 ";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $course_id = $row['course_id'];
                    echo '
                            <!--card start-->
                            <div class="cardStyle">
                                <div style="border-style: ridge;">
                                <a href="coursedetails.php?course_id=' . $course_id . '">
                                    <img src="image/courseimg/' . $row['course_img'] . ' " class="card-img-top" alt="No Img"/>
                                    <div class="card-body" style="height: 135px; overflow: hidden;">
                                        <p class="card-title font-weight-bold"> ' . $row['course_name'] . '</p>
                                        <small class="card-text"> ' . $row['course_desc'] . ' </small>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">Price :<small><del>&#8377  ' . $row['course_original_price'] . ' </del></small></p>
                                        <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . ' </span>
                                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '">Enroll</a>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <!--card end-->
                        ';
                }
            }

            ?>

        </div>
        <!--card 2 end-->

        <!--start more cources -->
        <div class="text-center m-4">
            <a class="btn btnCol" href="./courses.php">View all Courses</a>
        </div>
        <!--end more cources -->
    </div>
    <!--end New cources -->


    <!-- Start Contact Us -->

    <?php
    include("./contactus.php");
    ?>

    <!-- End Contact Us -->

    <!-- Include Footer -->

    <?php
    include("./Main-Includes/footer.php")
    ?>
    </div>


    <!-- Include Models -->
    <?php
    include("./modals.php");
    ?>


</body>

</html>