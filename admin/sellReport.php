<?php
if (!isset($_SESSION)) {
   session_start();
}
include('../Admin-Includes/header.php');
include('../dbconn.php');
if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLoginEmail'];
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
    <title>Courses</title>
    <?php
    include("../Admin-Includes/css_links.php");
    ?>
</head>

<body>
    <?php
    include("../Admin-Includes/navbar_admin.php");
    ?>
    <div class="container-fluid mb-5">
        <div class="row">
            <?php
            include("../Admin-Includes/sidebar_admin.php");
            ?>
            <div class="col-sm-10 mt-5">
                <div class="col-sm-9 mt-5 mx-3">
                    <form action="" method="Post" class="mt-3  form-inline d-print-none">
                        <div class="form-group mr-3">
                            <input type="date" name="startdate" id="startdate" class="form-control ml-3">
                        </div><span>
                            <h4>to</h4>
                        </span>
                        <div class="form-group mr-3">
                            <input type="date" name="enddate" id="enddate" class="form-control ml-3">
                        </div>
                        <Button type="submit" class="btn btnCol" name="searchsubmit" value="
                        Search">Search</Button>
                    </form>

                    <?php
                    if (isset($_REQUEST['searchsubmit'])) {
                        $startdate = $_REQUEST['startdate'];
                        $enddate = $_REQUEST['enddate'];

                        $sql = "select * from courseorder where order_date between '$startdate' and '$enddate'";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                            echo '<p class="bg-dark text-white p-2 mt-4">Details</p>
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Course Id</th>
            <th scope="col">Student Email</th>
            <th scope="col">Order date</th>
            <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>
                <th scope="row">' . $row["order_id"] . '</th>
                <td>' . $row["course_id"] . '</td>
                <td>' . $row["stu_email"] . '</td>
                <td>' . $row["order_date"] . '</td>
                <td>' . $row["amount"] . '</td>
                </tr>';
                            }
                            echo '<tr>
            <td><form class="d-print-none"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form></td>
            </tr></tbody>
            </table>';
            } else {
                            echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2 rol='alert'> No Records Found !</div>";
                        }
                    }
                    include("../Admin-Includes/js_admin.php");
                    ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>