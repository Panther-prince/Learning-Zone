<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../dbconn.php');

if (isset($_SESSION['is_login'])) {
    $adminEmail = $_SESSION['adminLoginEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
}
?>
