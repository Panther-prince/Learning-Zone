<?php 
session_start();
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad-Change Password</title>
    <?php
    include("../Admin-Includes/css_links.php");
    ?>
</head>

<body>
    <?php
    include("../Admin-Includes/navbar_admin.php");
    include("../dbconn.php");

    if(isset($_SESSION['is_admin_login'])){
        echo "<script> console.log('admin logged in') </script>";
        $adminEmail = $_SESSION['adminLoginEmail'];
        
    }
    else{
        echo "<script> location.href='../index.php'; </script>";
    }

//Upadate Code
    $adminEmail = $_SESSION['adminLoginEmail'];
    if(isset($_REQUEST['adminPassUpdatebtn'])){
        echo "<script>console.log('submit btn clicked')</script>";

        $adminPass = $_REQUEST['adminPass'];

        if($adminPass == null){
            $passmsg ='<div class = "alert alert-danger col-sm-6 ml-5 mt-2">Please Fill Passwod Field</div>';
        }
        else{
            $sql= "SELECT * FROM admin WHERE admin_email='$adminEmail'";
            $result = $con->query($sql);
            if($result->num_rows == 1){
                $sql ="UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email ='$adminEmail'";
                if($con->query($sql)== true){
                    $passmsg = '<div class ="alert alert-success col-sm-6 ml-5 mt-2" role = "alert">Admin Password Upadate Successfully</div>';
                }
                else{
                    $passmsg = '<div class ="alert alert-danger col-sm-6 ml-5 mt-2" role = "alert">Admin Password Upadate Faild</div>';
                }
            }
        }
    }
    ?>
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <?php
            include("../Admin-Includes/sidebar_admin.php");
            ?>
            <div class="col-sm-10 mt-5">
                <div class="row mx-5 ">
                    <div class="mx-5 mt-5" style="width: 500px;">
                        <form id="adminPassResetForm">
                            <div class="form-group">

                                <i class="fa-solid fa-envelope mr-2"></i><label for="adminEmail">Email</label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" value="<?php echo $adminEmail ?>" readonly>
                            </div>
                            <div class="form-group">
                                <i class="fas fa-key mr-2"></i><label for="adminNewPass"> New Password</label>
                                <input type="text" class="form-control" id="inputNewPass" placeholder="Enter New Password" name="adminPass">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btnCol mr-3" name="adminPassUpdatebtn"> Update</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                
                            </div>
                        </form>
                        <?php if(isset($passmsg)){ echo $passmsg; } ?>
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