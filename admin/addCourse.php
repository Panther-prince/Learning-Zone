    <?php
    include("../Admin-Includes/navbar_admin.php");
    include("../Admin-Includes/css_links.php");
    include('../dbconn.php');

    if (isset($_REQUEST['courseSubmitBtn'])) {
        if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") || ($_REQUEST['course_original_price'] == "")) {
            $msg = '<div class ="alert alert-warning col-sm-6 ml-5 mt-2">Please Fill All Fields</div>';
        } else {
            $course_name = trim($_REQUEST['course_name']);
            $course_desc = trim($_REQUEST['course_desc']);
            $course_author = trim($_REQUEST['course_author']);
            $course_duration = trim($_REQUEST['course_duration']);
            $course_original_price = trim($_REQUEST['course_original_price']);
            $course_price = trim($_REQUEST['course_price']);

            $course_image = $_FILES['course_img']['name'];
            $ext = pathinfo($course_image, PATHINFO_EXTENSION);
            $Rename = $course_name . '.' . $ext;
            $course_image_temp = $_FILES['course_img']['tmp_name'];
            $img_folder =  '../image/courseimg/' . $Rename;

            $sql = "INSERT INTO course(course_name, course_desc, course_author,course_img,course_duration,course_price,course_original_price) VALUES ('".$course_name."', '".$course_desc."', '".$course_author."','".$Rename."','$course_duration','$course_price','$course_original_price');";

            if ($con->query($sql)) {
                move_uploaded_file($course_image_temp, $img_folder);
                $msg = '<div class ="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
            } else {
                $msg = '<div class ="alert alert-danger col-sm-6 ml-5 mt-2">Course Adding Faild</div>';
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
        <title>Ad-Add Course</title>
    </head>

    <body>
        <div class="container-fluid mb-5" style="margin-top:40px;">
            <div class="row">
                <?php
                include("../Admin-Includes/sidebar_admin.php");
                ?>
                <div class="col-sm-6 mt-5 mx-3 jumbotron">
                    <h3 class="text-center titleStyle"> Add New Course </h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input type="text" class="form-control" id="course_name" name="course_name">
                        </div>

                        <div class="form-group">
                            <label for="course_desc">Course Description</label>
                            <textarea class="form-control" id="course_desc" name="course_desc" row=2></textarea>
                        </div>
                        <div class="form-group">
                            <label for="course_author">Author</label>
                            <input type="text" class="form-control" id="course_author" name="course_author">
                        </div>
                        <div class="form-group">
                            <label for="course_duration">Course Duration</label>
                            <input type="text" class="form-control" id="course_duration" name="course_duration">
                        </div>
                        <div class="form-group">
                            <label for="course_original_price">Course Original Price</label>
                            <input type="text" class="form-control" id="course_original_price" name="course_original_price">
                        </div>
                        <div class="form-group">
                            <label for="course_price">Course Selling Price</label>
                            <input type="text" class="form-control" id="course_price" name="course_price">
                        </div>
                        <div class="form-group">
                            <label for="course_img">Course Images</label>
                            <input type="file" class="form-control-file" id="course_img" name="course_img">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btnCol" id="courseSubmitBtn" name="courseSubmitBtn"> Submit </button>
                            <a href="admin_courses.php" class="btn btn-secondary"> Close </a>
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