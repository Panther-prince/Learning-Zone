<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../dbconn.php');

// if (isset($_SESSION['is_login'])) {
//     $adminEmail = $_SESSION['adminLoginEmail'];
// } else {
//     echo "<script> location.href='../index.php';</script>";
// }
?>

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
            <div class="col-sm-10 mt-5">
                <div class="row mx-5 text-center">
                    <div class="mx-5 mt-5 text-center" style="width: 100%;">
                        <!-- table -->
                        <h4 class="text-white p-2 txt-banner titleStyle">List of Feedbacks</h4>
                        <?php
                        $sql = "SELECT * FROM feedback";
                        $result = $con->query($sql);
                        if ($result->num_rows > 0) {
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Feedback ID</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $result->fetch_assoc()) {
                                        echo '<tr>';
                                        echo   '<th scope="row">' . $row['f_id'] . '</th>';
                                        echo    '<td>' . $row['f_content'] . '</td>';
                                        echo    '<td>' . $row['stu_id'] . '</td>';
                                        echo    '<td>';

                                        echo    '<form action="" method="post" class="d-inline">
                                        <input type="hidden" name="id" value='. $row["f_id"].'>
                                                    <button 
                                                    type="submit" 
                                                    class="btn btn-primary" 
                                                    name="delete" 
                                                    value="delete">
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
                            $sql = "DELETE FROM feedback WHERE f_id={$_REQUEST['id']}";
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
    </div>
    <?php
    include("../Admin-Includes/js_admin.php");
    ?>
</body>

</html>