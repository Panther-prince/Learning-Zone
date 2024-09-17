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
if (isset($_REQUEST['updatePass'])) {
    if (($_REQUEST['stuNewPass'] == "")) {
        $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Please Fill Password Fields</div>';
    } else {
        $sql = "SELECT * FROM student WHERE stu_email='$stdLoginEmail'";
        $result=$con->query($sql);
        if ($result->num_rows == 1) {
            $stuPass=$_REQUEST['stuNewPass'];
            $sql = "UPDATE student SET stu_pass ='$stuPass' WHERE stu_email ='$stdLoginEmail'";
            if ($con->query($sql)) {
                $passmsg = '<div class = "alert alert-success col-sm-6 ml-5 mt-2">Upadate Successfully</div>';
            } else {
                $passmsg = '<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
            }
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
            <h3 class="text-center titleStyle" style="padding-top: 50px;"> Student Password Change </h3>
            <form action="" method="post" enctype="multipart/form-data" class="mx-5 my-5">
                <div class="form-group">
                    <label for="stuEmail" class="font-weight-bold">Email</label>
                    <input type="text" class="form-control" id="stuEmail" name="stuEmail" value="<?php if (isset($stdLoginEmail)) {  echo $stdLoginEmail;   } ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="stuName" class="font-weight-bold">New Password</label>
                    <input placeholder="New Password" type="password" class="form-control" id="inputnewPassword" name="stuNewPass">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btnCol" id="updatePass" name="updatePass"> Upadate </button>
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