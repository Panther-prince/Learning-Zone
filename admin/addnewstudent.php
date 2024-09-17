<?php
include("../Admin-Includes/navbar_admin.php");
include("../Admin-Includes/css_links.php");
include('../dbconn.php');

if (isset($_REQUEST['newStuSubmitBtn'])) {
    if (($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_occ'] == "")) {
        $msg = '<div class ="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else {
        $student_name = $_REQUEST['stu_name'];
        $student_email = $_REQUEST['stu_email'];
        $student_pass = $_REQUEST['stu_pass'];
        $student_occ = $_REQUEST['stu_occ'];

        $sql = "INSERT INTO student(stu_name, stu_email, stu_pass,stu_occ) VALUES ('$student_name', '$student_email', '$student_pass','$student_occ');";

        if ($con->query($sql) == true) {

            $msg = '<div class ="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
        } else {
            $msg = '<div class ="alert alert-danger col-sm-6 ml-5 mt-2">Student Adding Faild</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad-Add Student</title>
</head>

<body>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <?php
            include("../Admin-Includes/sidebar_admin.php");
            ?>
            <div class="col-sm-6 mt-5 mx-3 jumbotron">
                <h3 class="text-center titleStyle"> Add New Student </h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="student_name">Student Name</label>
                        <input type="text" class="form-control" id="stu_name" name="stu_name">
                    </div>

                    <div class="form-group">
                        <label for="course_desc">Email</label>
                        <input type="text" class="form-control" id="stu_email" name="stu_email">
                    </div>
                    <div class="form-group">
                        <label for="course_author">Password</label>
                        <input type="text" class="form-control" id="stu_pass" name="stu_pass">
                    </div>
                    <div class="form-group">
                        <label for="course_duration">Occupation</label>
                        <input type="text" class="form-control" id="stu_occ" name="stu_occ">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn"> Submit </button>
                        <a href="admin_students.php" class="btn btn-secondary"> Close </a>
                    </div>
                    <?php if (isset($msg)) {
                        echo $msg;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include("../Admin-Includes/js_admin.php");
?>