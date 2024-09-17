<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Courses</title>

    <!-- Include CSS -->
    <?php
    include("./dbconn.php");
    include("./Main-Includes/addcss.php");
    ?>

</head>

<body>

    <!-- Include Navbar -->
    <?php
    include("./Main-Includes/navbar.php")
    ?>

    <!--Start All Cources-->
    <div class="container mt-5" style="padding-top: 100px;">
        <h4 class="text-center titleStyle">Search: <?php echo $_GET['search'] ?></h4>
        <div class="row mt-4">
            <?php  
                $search = $_GET['search'];
                $sql = "SELECT * FROM course WHERE course_name LIKE '%$search%'";
                $result = $con->query($sql);

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $course_id = $row['course_id'];
                        echo '
                            <!--card start-->
                            <div class="cardStyle">
                                <div style="border-style: ridge;">
                                <a href="coursedetails.php?course_id=' .$course_id. '">
                                    <img src="image/courseimg/'. $row['course_img'] .' " class="card-img-top" alt="No Img"/>
                                    <div class="card-body" style="height: 135px; overflow: hidden;">
                                        <p class="card-title font-weight-bold"> '. $row['course_name'] .'</p>
                                        <small class="card-text"> '. $row['course_desc'] .' </small>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text d-inline">Price :<small><del>&#8377  '. $row['course_original_price'] .' </del></small></p>
                                        <span class="font-weight-bolder">&#8377 '. $row['course_price'] .' </span>
                                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' .$course_id. '">Enroll</a>
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

    </div>
    <!--end cources popular-->
    <?php
    include("./contactus.php")
    ?>

    <!-- Include Models -->
    <?php
    include("./modals.php");
    ?>

    <!-- Include Footer -->
    <?php
    include("./Main-Includes/footer.php")
    ?>
</body>

</html>