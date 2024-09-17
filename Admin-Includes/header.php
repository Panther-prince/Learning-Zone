<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    include("../Admin-Includes/navbar_admin.php");
    include('../dbconn.php');
    
    if (isset($_SESSION['is_admin_login'])) {
        $adminEmail = $_SESSION['adminLoginEmail'];
    } 
    else {
        echo '<script>location.href="../index.php"; </script>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Zone</title>
    <?php
    include("../Admin-Includes/css_links.php");
    ?>
</head>