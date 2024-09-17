<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../dbconn.php');

if (isset($_SESSION['is_login'])) {
    $stdLoginEmail = $_SESSION['stdLoginEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
}
$sql = "SELECT * FROM student WHERE stu_email='$stdLoginEmail'";
$result = $con->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row['stu_name'];
}
if (isset($_REQUEST['submitFeedbackBtn'])) {
    if (($_REQUEST['f_content'] == "")) {
        $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else {
        $fcontent = $_REQUEST["f_content"];

        $sql = "INSERT INTO feedback(f_content,stu_id) VALUES('$fcontent','$stuId
        ')";

        if ($con->query($sql)) {
            $passmsg = '<div class = "alert alert-success col-sm-6 ml-5 mt-2">Feedback Sent</div>';
        } else {
            $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Unable to Send</div>';
        }
    }
}
?>
<div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <?php
        include("./stuInclude/header.php");
        ?>



        <div class="col-sm-6 mt-3 mx-3 alert">
            <!-- <h3 class="text-center"> Upadate Student Details </h3> -->
            <h3 class="text-center titleStyle" style="padding-top: 50px;"> Student Feedback</h3>
            <form action="" method="post" enctype="multipart/form-data" class="mx-5 my-5">
                <div class="form-group">
                    <label for="stuId" class="font-weight-bold">Student Id</label>
                    <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (isset($stuId)) { echo $stuId; } ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="stuId" class="font-weight-bold">Student Name</label>
                    <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (isset($stuName)) { echo $stuName; } ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="f_content" class="font-weight-bold">Write Feedback</label>
                    <textarea type="text" rows="5" cols="23" class="form-control" id="f_content" name="f_content" value="<?php if (isset($f_content)) { echo $f_content; } ?>">
                    </textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btnCol" id="submitFeedbackBtn" name="submitFeedbackBtn"> Submit </button>
            <!-- <a href="courses.php" class="btn btn-secondary"> Close </a> -->
        </div>
        <?php 
        if (isset($passmsg)) {
            echo $passmsg;
        }
        ?>
    </form>
</div>
        <!-- </div>
</div> -->
<?php
include('./stuInclude/footer.php');
?>