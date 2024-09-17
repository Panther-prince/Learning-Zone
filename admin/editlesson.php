<?php

include("../Admin-Includes/navbar_admin.php");
include("../Admin-Includes/css_links.php");
include('../dbconn.php');
if (isset($_REQUEST['requpdate'])) {
    if (($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "")) {
        $msg = '<div class ="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else {
        $lesson_id = $_REQUEST['lesson_id'];
        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $lesson_link = $_FILES['lesson_link']['name'];

        if(!empty($lesson_link)){
            $OldVid= $_REQUEST['oldVidLink'];
            unlink($OldVid);

            $lesson_vid_temp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = $lesson_link;

            move_uploaded_file($lesson_vid_temp, $link_folder);
            $sql = "UPDATE lesson SET lesson_link='$lesson_link' WHERE lesson_id = '$lesson_id'";
            $con->query($sql);
        }

        $sql = "UPDATE lesson SET lesson_name = '$lesson_name', lesson_desc = '$lesson_desc' WHERE lesson_id = '$lesson_id'";
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
            <h3 class="text-center"> Upadate Lesson Details </h3>
            <?php
            if (isset($_REQUEST['edit'])) {
                $sql = "SELECT * FROM lesson WHERE lesson_id ={$_REQUEST['id']}";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="lesson_id">Lesson ID</label>
                    <input type="text" class="form-control" id="lesson_id" name="lesson_id" 
                    value="<?php if (isset($row['lesson_id'])) { echo $row['lesson_id'];} ?>" 
                    readonly
                    />
                </div>
                <div class="form-group">
                    <label for="lesson_name">Lesson Name</label>
                    <input type="text" class="form-control" id="lesson_name" name="lesson_name" value="<?php if (isset($row['lesson_name'])) {echo $row['lesson_name'];} ?>"
                    />
                </div>

                <div class="form-group">
                    <label for="lesson_desc">Lesson Description</label>
                    <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2>
                        <?php if (isset($row['lesson_desc'])) {
                            echo $row['lesson_desc'];
                        } ?>
                        </textarea>
                </div>

                <div class="form-group">
                    <label for="course_id">Course ID</label>
                    <input type="text" class="form-control" id="course_id" name="course_id" 
                    value="<?php if (isset($row['course_id'])) { echo $row['course_id'];} ?>" 
                    readonly
                    />
                </div>
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {echo $row['course_name'];} ?>" readonly
                    />
                </div>
                
                <div class="form-group">
                    <label for="lesson_link">Lesson Link</label>
                    <div class="embed-responsive-item embed-responsive-16by9">
                        <iframe class="embed-responsive-item" 
                            src="<?php if(isset($row['lesson_link'])) { echo $row['lesson_link']; } ?>" allowfullscreen>
                        </iframe>
                    </div>
                    <input type="file" class="form-control-file" id="lesson_link" name="lesson_link" />
                </div>
                
                
                <div class="text-center">
                    <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate"> Upadate </button>
                    <a href="admin_lessons.php" class="btn btn-secondary"> Close </a>
                </div>
                <?php if (isset($msg)) {
                    echo $msg;
                }
                ?>
                <input name="oldVidLink" type="hidden" value="<?php if (isset($row['lesson_link'])) {
                                    echo $row['lesson_link'];
                                } ?>" >
            </form>
        </div>
    </div>
</div>
<?php
include("../Admin-Includes/js_admin.php");
?>