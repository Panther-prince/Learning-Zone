<?php

if (!isset($_SESSION)) {
    session_start();
}
include_once('../dbconn.php');

// Admin Login Verification 
    
    if (isset($_POST['adminLoginEmail']) && isset($_POST['adminLoginPass'])) {
        $adminLoginEmail = $_POST['adminLoginEmail'];
        $adminLoginPass = $_POST['adminLoginPass'];

        $sql = "SELECT admin_email, admin_pass FROM admin WHERE admin_email ='" . $adminLoginEmail . "' AND admin_pass = '" . $adminLoginPass . "'";

        $result = $con->query($sql);
        $row = $result->num_rows;

        if ($row === 1) {
            $_SESSION['is_admin_login'] = true;
            $_SESSION['adminLoginEmail'] = $adminLoginEmail;
            
            echo json_encode($row);
        } 
        else if ($row === 0) {
            echo json_encode($row);
        }
    }

?>