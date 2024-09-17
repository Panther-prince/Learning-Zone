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
    $stuEmail = $row["stu_email"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
}
if (isset($_REQUEST['updateStuNameBtn'])) {
    if (($_REQUEST['stuName'] == "")) {
        $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];
        $stu_image = $_FILES['stuImg']['name'];



        if (!empty($stu_image)) {

            $stu_image_temp = $_FILES['stuImg']['tmp_name'];
            $img_folder = '../image/stu/' . $stu_image;

            move_uploaded_file($stu_image_temp, $img_folder);

            $sql = "UPDATE student SET stu_img ='$img_folder' WHERE stu_id = '$stuId'";
            $con->query($sql);
        }

        $sql = "UPDATE student SET stu_name = '$stuName', stu_occ ='$stuOcc' WHERE stu_email= '$stuEmail'";

        if ($con->query($sql)) {
            $passmsg = '<div class = "alert alert-success col-sm-6 ml-5 mt-2">Upadate Successfully</div>';
        } else {
            $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}
?>
<div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <?php
        include("./stuInclude/header.php");
        ?>



        <div class="col-sm-6 mt-5 mx-3">
            <!-- <h3 class="text-center"> Upadate Student Details </h3> -->
            <h3 class="text-center titleStyle"> Student Details </h3>
            <form action="" method="post" enctype="multipart/form-data" class="mx-5">
                <div class="form-group">
                    <label for="stuId">Student Id</label>
                    <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (isset($stuId)) { echo $stuId; } ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="stuEmail">Email</label>
                    <input type="text" class="form-control" id="stuEmail" name="stuEmail" value="<?php if (isset($stuEmail)) { echo $stuEmail; } ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="stuName">Name</label>
                    <input type="text" class="form-control" id="stuName" name="stuName" value="<?php if (isset($stuName)) {  echo $stuName; } ?>">
                </div>

                <div class="form-group">
                    <label for="stuOcc">Occupation</label>
                    <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if (isset($stuOcc)) {  echo $stuOcc; } ?>">
                </div>
                <div class="form-group">
                    <label for="stuImg">Upaload Image</label>
                    <input type="file" class="form-control" id="stuImg" name="stuImg" value="<?php if (isset($stuImg)) { echo $stuImg; } ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btnCol" id="updateStuNameBtn" name="updateStuNameBtn"> Upadate </button>
                    <!-- <a href="courses.php" class="btn btn-secondary"> Close </a> -->
                </div>
                <?php if (isset($passmsg)) {
                    echo $passmsg;
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
include('./stuInclude/footer.php');
?>

</body>

</html>