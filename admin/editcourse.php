<?php

include("../Admin-Includes/navbar_admin.php");
include("../Admin-Includes/css_links.php");
include('../dbconn.php');
if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") || ($_REQUEST['course_original_price'] == "")) {
        $msg = '<div class ="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else {
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_price = $_REQUEST['course_price'];
        $course_image = $_FILES['course_img']['name'];
        if(!empty($course_image)){
            $OldImg= '../image/courseimg/' . $_REQUEST['OldImg'];
            unlink($OldImg);
            $course_image_temp = $_FILES['course_img']['tmp_name'];
            $img_folder =  '../image/courseimg/' . $course_image;
            move_uploaded_file($course_image_temp, $img_folder);
            $sql = "UPDATE course SET course_img='$course_image' WHERE course_id = '$course_id'";
            $con->query($sql);
        }

        $sql = "UPDATE course SET course_id ='$course_id', course_name= '$course_name', course_desc = '$course_desc', course_author ='$course_author',course_duration ='$course_duration',course_original_price ='$course_original_price',course_price ='$course_price' WHERE course_id = '$course_id'";
        $update = $con->query($sql);
        
        if ($update == true) {
            $msg = '<div class ="alert alert-success col-sm-6 ml-5 mt-2">Course Upadate Successfully</div>';
        } else {
            $msg = '<div class ="alert alert-danger col-sm-6 ml-5 mt-2">Course Update Faild</div>';
        }
    }
}
?>
<div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <?php
        include("../Admin-Includes/sidebar_admin.php");
        ?>
        <div class="col-sm-6 mt-5 mx-3 jumbotron">
            <h3 class="text-center"> Upadate Course Details </h3>
            <?php
            if (isset($_REQUEST['edit'])) {
                $sql = "SELECT * FROM course WHERE course_id ={$_REQUEST['id']}";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="course_id">Course ID</label>
                    <input type="text" class="form-control" id="course_id" name="course_id" 
                    value="<?php if (isset($row['course_id'])) { echo $row['course_id'];} ?>" 
                    readonly
                    />
                </div>
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {echo $row['course_name'];} ?>"
                    />
                </div>

                <div class="form-group">
                    <label for="course_desc">Course Description</label>
                    <textarea class="form-control" id="course_desc" name="course_desc" row=2>
                        <?php if (isset($row['course_desc'])) {
                            echo $row['course_desc'];
                        } ?>
                        </textarea>
                </div>
                <div class="form-group">
                    <label for="course_author">Author</label>
                    <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if (isset($row['course_author'])) {
                    echo $row['course_author'];
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="course_duration">Course Duration</label>
                    <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if (isset($row['course_duration'])) {
                                                                                                                    echo $row['course_duration'];
                                                                                                                } ?>">
                </div>
                <div class="form-group">
                    <label for="course_original_price">Course Original Price</label>
                    <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if (isset($row['course_original_price'])) {
                                                                                                                                echo $row['course_original_price'];
                                                                                                                            } ?>">
                </div>
                <div class="form-group">
                    <label for="course_price">Course Selling Price</label>
                    <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if (isset($row['course_price'])) {
                                                                                                                echo $row['course_price'];
                                                                                                            } ?>">
                </div>
                <div class="form-group">
                    <label for="course_img">Course Images</label>
                    <img src="<?php if (isset($row['course_img'])) {
                                    echo "../image/courseimg/".$row['course_img'];
                                } ?>" alt="" class="img-thumbnail">
                    <input type="file" class="form-control-file" id="course_img" name="course_img">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate"> Upadate </button>
                    <a href="admin_courses.php" class="btn btn-secondary"> Close </a>
                </div>
                <?php if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <input name="OldImg" type="hidden" value="<?php if (isset($row['course_img'])) {
                                    echo "../image/courseimg/".$row['course_img'];
                                } ?>" >
            </form>
        </div>
    </div>
</div>
<?php
include("../Admin-Includes/js_admin.php");
?>