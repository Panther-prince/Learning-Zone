<?php
    include("../Admin-Includes/header.php");
?>
<body>
    <?php
    include("../Admin-Includes/navbar_admin.php");
    include('../dbconn.php');
    ?>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <?php
            include("../Admin-Includes/sidebar_admin.php");
            ?>
            <div class="col-sm-10 mt-5">
                <div class="row mx-5 text-center">
                    <div class="mx-5 mt-5 text-center" style="width: 100%;">
                        <!-- table -->
                        <h4 class="text-white p-2 txt-banner titleStyle">List of Students</h4>
                        <?php
                        $sql = "SELECT * FROM student";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Student Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo   '<th scope="row">'.$row['stu_id'].'</th>';
                                        echo    '<td>'.$row['stu_name'].'</td>';
                                        echo    '<td>'.$row['stu_email'].'</td>';
                                        echo    '<td>';

                                        echo    '<form action="editstudent.php" method="post" class="d-inline">
                                        <input type="hidden" name="id" value='.$row["stu_id"].'>
                                                    <button 
                                                    type="submit" 
                                                    class="btn btn-primary" 
                                                    name="edit" 
                                                    value="Edit">
                                                    <i class="fa-solid fa-pen"></i>
                                                </button>
                                                </form>
                                                <form action="" method="post" class="d-inline">
                                                <input type="hidden" name="id" value='.$row["stu_id"].'>
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
                                    } ?>
                                </tbody>
                            </table>
                        <?php } else {
                            echo "0 Result";
                        }
                        if (isset($_REQUEST['delete'])) {
                            $sql = "DELETE FROM student WHERE stu_id={$_REQUEST['id']}";
                            if ($con->query($sql) == true) {
                                echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
                            } else {
                                echo "Unable to Delete Data";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="plus">
            <a class="btn btn-danger " href="./addnewstudent.php">
                <i class="fas fa-plus fa-2x"></i>
            </a>
        </div>
    </div>
    <?php
    include("../Admin-Includes/js_admin.php");
    ?>
</body>

</html>