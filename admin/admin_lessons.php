<?php
    include("../Admin-Includes/header.php");
?>

<body>
    <?php
        include("../Admin-Includes/navbar_admin.php");
    ?>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <?php
                include("../Admin-Includes/sidebar_admin.php");
            ?>

            <div class="col-sm-9 mt-5 mx-3">
                <form action="" method="post" class="mt-3  form-inline d-print-none">
                    <div class="form-group mr-3">
                        <label for="checkid">Enter Course ID : </label>
                        <input type="text" name="checkid" id="checkid" class="form-control ml-3">
                    </div>
                    <Button type="submit" class="btn btnCol">Search</Button>
                </form>

                <?php 
                    $sql = "SELECT course_id FROM course";
                    $result = $con->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id'])
                        {
                            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
                            $result = $con->query($sql);
                            $row = $result->fetch_assoc();
                            if($row['course_id'] == $_REQUEST['checkid'])
                            {
                                $_SESSION['course_id'] = $row['course_id'];
                                $_SESSION['course_name'] = $row['course_name'];
                ?>
                <h4 class="titleStyle"> Course ID: 
                    <?php 
                        if (isset($_SESSION['course_id'])) {
                            echo $_SESSION['course_id'];
                        }
                    ?>
                    
                    <br><br>
                    Course Name: 
                    <?php 
                                    if (isset($_SESSION['course_name'])) {
                                        echo $_SESSION['course_name'];
                                    }
                    ?>
                
                </h4>
                <br>
                <?php
                                    $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
                                    $result = $con->query($sql);

                                    if ($result->num_rows > 0) 
                                    {
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Lesson ID</th>
                            <th scope="col">Lesson Name</th>
                            <th scope="col">Lesson Link</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                                        while ($row = $result->fetch_assoc()) 
                                        {
                                            echo '<tr>';
                                            echo '<th scope="row">' . $row['lesson_id'] . '</th>';
                                            echo '<td>' . $row['lesson_name'] . '</td>';
                                            echo '<td>' . $row['lesson_link'] . '</td>';
                                            echo '<td>';

                                            echo '<form action="editlesson.php" method="post" class="d-inline">
                                                        <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                                                        <button 
                                                            type="submit" 
                                                            class="btn btn-primary" 
                                                            name="edit" 
                                                            value="Edit">
                                                                <i class="fa-solid fa-pen"></i>
                                                        </button>
                                                    </form>
                                                    <form action="" method="post" class="d-inline">
                                                        <input type="hidden" name="id" value=' . $row["lesson_id"] . '>
                                                        <button 
                                                            type="submit" 
                                                            class="btn btn-secondary" 
                                                            name="delete" 
                                                            value="Delete">
                                                                <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>';
                                            echo '</td>';
                                            echo '</tr>';
                                        } 
                                ?>
                    </tbody>
                </table>
                                    
                <?php 
                                    } 
                                    else 
                                    {
                                        echo '<div class="alert alert-dark mt-4" role="alert"> Lessons is Not Found </div>';
                                    }
                                
                            }
                    
                        }
                        if (isset($_REQUEST['delete'])) {
                            echo "You enter in delete";
                            $sql = "DELETE FROM lesson WHERE lesson_id={$_REQUEST['id']}";
                            if ($con->query($sql) == true) {
                                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                            } else {
                                echo "Unable to Delete Data";
                            }
                        }
                    }
                ?>

            </div>
            <br>
            
        </div>
        <?php
            if(isset($_SESSION['course_id'])){
                echo '<div>

                <form action="./addLesson.php" method="post" class="d-inline">
                    <input type="hidden" name="id" value=' . $_SESSION['course_id'] . '>
                    <button 
                        type="submit" 
                        class="btn btn-danger box" 
                        name="addLessonBtn" 
                        value="addLessonBtn">
                        <i class="fas fa-plus fa-2x"></i>
                    </button>
                </form>

                
                </div>';
            }
        ?>
        
    </div>


    <?php
    include("../Admin-Includes/js_admin.php");
    ?>
    
</body>

</html>