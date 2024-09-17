<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>

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

    <!-- Start Main Content -->
    <div class="container mt-5"  style="padding-top: 100px;">
        <?php  
            if (isset($_GET['course_id'])) {
                $course_id = $_GET['course_id'];
                $_SESSION['course_id'] = $course_id;
                $sql = "SELECT * FROM course WHERE course_id = $course_id";
                $result = $con->query($sql);
                $row = $result->fetch_assoc(); 
            }
        
        ?>
        <h1 class="text-center titleStyle">Course Details</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="./image/courseimg/<?php echo $row['course_img'] ?>" class="card-img-top" alt="No Image" style="width:250px; height:250px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <br>
                    <h4 class="card-title"><b> Course Name : </b><?php echo $row['course_name'] ?> </h4>
                    <p class="card-text"><b> Description : </b> <?php echo $row['course_desc'] ?></p>
                    <p class="card-text"><b> Duration : </b><?php echo $row['course_duration'] ?> Hours </p>
                    <form action="checkout.php" method="post">
                        <p class="card-text d-inline">
                            <b> Price :</b><small><del>&#8377 <?php echo $row['course_original_price'] ?></del></small>
                            <span class="font-weight-bolder">&#8377 <?php echo $row['course_price'] ?> </span>
                        </p>
                        <input type="hidden" name="price" value="<?php echo $row['course_price'] ?>"/>
                        <button type="submit" class="btn text-white font-weight-bolder float-right btnCol" name="buy">
                            Buy Now
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" style="width: 150px;">Lesson No.</th>
                    <th scope="col">Lesson Name</th>
                </tr>
            </thead>
            <tbody>

        <?php 
            $sql = "SELECT * FROM lesson WHERE course_id=".$_GET['course_id'];
            $result = $con->query($sql);
            if($result->num_rows > 0){
                $num = 1;
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <tr>
                            <th scope="row">'. $num .'</th>
                            <td>'.$row['lesson_name'].'</td>
                        </tr>
                    ';
                    $num++;    
                }
            }
            // else{
            //     echo '
            //         <tr>
            //             <th scope="row" colspan=2 class="text-center"> Lessons Not Found </th>
            //         </tr>
            //     '; 
            // }
        ?>
                
            </tbody>
            </table>
        </div>
    </div>




    <!-- End Main Content -->

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