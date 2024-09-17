<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deshboard</title>
    <?php
    include("../dbconn.php");
    include("../Admin-Includes/css_links.php");
    ?>
</head>

<body>
    <?php
    $sql = "SELECT * FROM course";
    $result = $con->query($sql);
    $totalcourses = $result->num_rows;
    
    $sql = "SELECT * FROM student";
    $result = $con->query($sql);
    $totalStudent =  $result->num_rows;
    

    $sql = "SELECT * FROM courseorder";
    $result = $con->query($sql);
    $noOfStudent =  $result->num_rows;

    include("../Admin-Includes/navbar_admin.php");
    ?>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <?php
            include("../Admin-Includes/sidebar_admin.php");
            ?>

            <div class="col-sm-10 mt-5">
                <div class="row mx-5 text-center">
                    <!-- start card -->
                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">Courses</div>
                            <div class="card-body">
                                <h4 class="card-title"> <?php echo strval($totalcourses) ?> </h4>
                                <a href="admin_courses.php" class="btn text-white"> View </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">Students</div>
                            <div class="card-body">
                                <h4 class="card-title"> <?php echo strval($totalStudent) ?> </h4>
                                <a href="admin_students.php" class="btn text-white"> View </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-5">
                        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-header">Sold</div>
                            <div class="card-body">
                                <h4 class="card-title"> <?php echo strval($noOfStudent) ?> </h4>
                                <a href="sellReport.php" class="btn text-white"> View </a>
                            </div>
                        </div>
                    </div>
                    <!--end card -->
                    <div class="mx-5 mt-5 text-center" style="width: 100%;">
                        <!-- table -->
                        <h4 class="txt-banner titleStyle text-white p-2">Course Ordered</h4>
                        <?php
                        $sql = "SELECT * FROM courseorder";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Course ID</th>
                                        <th scope="col">Student Email</th>
                                        <th scope="col">Order Date</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo   '<th scope="row">'.$row['order_id'].'</th>';
                                        echo    '<td>'.$row['course_id'].'</td>';
                                        echo    '<td>'.$row['stu_email'].'</td>';
                                        echo    '<td>'.$row['order_date'].'</td>';
                                        echo    '<td>'.$row['amount'].'</td>';
                                        echo    '<td>';
                                        echo '</td>';
                                        echo '</tr>';
                                    } ?>
                                </tbody>
                            </table>
                            <?php } else {
                            echo "0 Result";
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("../Admin-Includes/js_admin.php");
    ?>
</body>

</html>