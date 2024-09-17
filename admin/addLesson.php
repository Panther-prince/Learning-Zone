<?php
include("../Admin-Includes/navbar_admin.php");
include("../Admin-Includes/css_links.php");
include('../dbconn.php');

if (isset($_REQUEST['lessonSubmitBtn'])) {
    if (($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")) {
        $msg = '<div class ="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
    } else {
        $lesson_name = trim($_REQUEST['lesson_name']);
        $lesson_desc = trim($_REQUEST['lesson_desc']);
        $course_id = trim($_REQUEST['course_id']);
        $course_name = trim($_REQUEST['course_name']);

        $lesson_vid = $_FILES['lesson_link']['name'];
        $ext = pathinfo($lesson_vid, PATHINFO_EXTENSION);
        $Rename = $lesson_name . $course_id . '.' . $ext;
        $lesson_vid_temp = $_FILES['lesson_link']['tmp_name'];
        $link_folder = '../lessonvid/' . $Rename;



        $sql = "INSERT INTO lesson(lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES ('". $lesson_name ."', '". $lesson_desc ."', '". $link_folder ."', '$course_id', '". $course_name ."');";

        if ($con->query($sql) == true) {
            move_uploaded_file($lesson_vid_temp, $link_folder);
            $msg = '<div class ="alert alert-success col-sm-6 ml-5 mt-2"> Lesson Added Successfully </div>';
        } else {
            $msg = '<div class ="alert alert-danger col-sm-6 ml-5 mt-2"> Lesson Adding Faild </div>';
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
    <title>Ad-Add Lesson</title>
</head>

<body>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <?php
            include("../Admin-Includes/sidebar_admin.php");
            ?>
            <div class="col-sm-6 mt-5 mx-3 jumbotron">
                <h3 class="text-center titleStyle"> Add New Lesson </h3>
                <?php
                if (isset($_REQUEST['addLessonBtn'])) {
                    $sql = "SELECT * FROM course WHERE course_id ={$_REQUEST['id']}";
                    $result = $con->query($sql);
                    $row = $result->fetch_assoc();
                }
                ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="course_id">Course ID </label>
                        <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['course_id'])) { echo $row['course_id']; } ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="course_name">Course Name</label>
                        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) { echo $row['course_name'];  } ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="lesson_name">Lesson Name</label>
                        <input type="text" class="form-control" id="lesson_name" name="lesson_name">
                    </div>

                    <div class="form-group">
                        <label for="lesson_desc">Lesson Description</label>
                        <textarea type="text" class="form-control" id="lesson_desc" name="lesson_desc" row=2>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="lesson_link">Lesson Video</label>
                        <input type="file" class="form-control" id="lesson_link" name="lesson_link">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btnCol" id="lessonSubmitBtn" name="lessonSubmitBtn"> Submit </button>
                        <a href="admin_lessons.php" class="btn btn-secondary"> Close </a>
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