<?php 
include("../dbconn.php");

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_login'])){
    $stuLoginEmail = $_SESSION['stdLoginEmail'];
}else {
    echo "<script> location.href = '../index.php' </script>";
}
?>



<div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
        <?php
            include("./stuInclude/header.php");
            ?>



    <!-- Start Main Content -->
    
    <div class="container mt-5 ml-4" style="width:80%">
        <div class="row">
            <div class="jumbotron scrollableY" style="height:100vh">
                <h3 class="text-center titleStyle">Your Courses</h3>
                <?php 
                    if(isset($stuLoginEmail)){
                        echo "<script> console.log('$stuLoginEmail') </script>";
                        $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_author, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email = '$stuLoginEmail'";
                        $result = $con->query($sql);
                        echo "<script> console.log('$result->num_rows') </script>";
                        if($result->num_rows > 0){
                            echo "<script> console.log('$result->num_rows') </script>";
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="bg-light mb-3">
                                    <h5 class="card-header"> <?php echo $row['course_name']; ?> </h5>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?php echo '../image/courseimg/' . $row['course_img']; ?>" class="card-img-top" alt="No Image">
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <div class="card-body">
                                                <p class="card-title">
                                                    <?php echo $row['course_desc']; ?>
                                                </p>
                                                <small class="card-text">Duration: <?php echo $row['course_duration']; ?></small></br>
                                                <small class="card-text">Instructor: <?php echo $row['course_author']; ?></small></br>
                                                <p class="card-text d-inline">
                                                    Price: 
                                                    <small><del>&#8377 <?php echo $row['course_original_price']; ?></del></small>
                                                    <span class="font-weight-bolder">&#8377 <?php echo $row['course_price']; ?></span>
                                                </p>
                                                <a href="./watchcourse.php?course_id=<?php echo $row['course_id']; ?>" class="btn btn-primary mt-5 float-right">Watch Course</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                                <?php
                            }
                        }
                    }
                
                ?>
            </div>
        </div>

    </div>



    <!-- End Main Content -->

    <?php
include('./stuInclude/footer.php');
?>