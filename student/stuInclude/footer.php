
<!-- Contact us container Start -->
<?php
if (!isset($_SESSION)) {
    session_start();
}
include('../dbconn.php');



if (isset($_REQUEST['submitFeedbackBtn'])) {


    if (isset($_SESSION['is_login'])) {
        $stdLoginEmail = $_SESSION['stdLoginEmail'];
    } else {
        echo "<script> location.href='../loginsignup.php';</script>";
    }

    $sql = "SELECT * FROM student WHERE stu_email='$stdLoginEmail'";
    $result = $con->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stuId = $row["stu_id"];
        $stuName = $row['stu_name'];
    }


    if (($_REQUEST['f_content'] == "")) {
        $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else {
        $fcontent = $_REQUEST["f_content"];

        $sql = "INSERT INTO feedback(f_content,stu_id) VALUES('$fcontent','$stuId')";

        if ($con->query($sql)) {
            $message = "Feedback Sent Successfully";
            echo '<script>alert("' . $message . '");</script>';
            echo "<script> setTimeout(() => { window.location.href = './index.php';}, 500); </script>";
        } else {
            $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Unable to Send</div>';
        }
    }
}
?>
<hr>

<div class="contact w-100" id="contact">
    <div class="container" style="padding-top: 100px;">
        <!--  Start Container -->
        <h2 class="text-center mb-4 titleStyle">Contact Us</h2>
        <div class="row">
            <!-- Start Contact Us Row -->
            <div class="col-md-8">
                <!-- Start Contact Us 1st Column -->
                <form action="" method="post">
                    <input type="text" class="form-control" name="name" placeholder="Name"><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                    <input type="text" class="form-control" name="email" placeholder="Email"><br>
                    <textarea class="form-control" name="f_content" placeholder="How can we help you?" style="height: 150px;"></textarea><br>
                    <input class="btn btn-primary btnCol" type="submit" value="Send" name="submitFeedbackBtn"><br><br>
                </form>
            </div> <!-- End Contact Us 1st Column -->
            <div class="col-md-4 stripe text-white text-center">
                <!-- Start Contact Us 2nd Column -->
                <h4> LearningZone</h4>
                <p>
                    Email : learningzone@gmail.com <br>
                    Phone No : 1234567890 <br>
                    Website : www.learningzone.com
                </p>
            </div> <!-- End Contact Us 2nd Column -->
        </div> <!-- End Contact Us Row -->
        <!--  End Container -->
    </div>
</div>
<!-- Contact us container End -->

<!-- Include Models -->
<?php
include("../modals.php");
?>

<!-- Include Footer -->
<?php
include("../Main-Includes/footer.php")
?>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>