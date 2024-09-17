<?php 
session_start();
session_destroy();
echo "<script> location.href = 'index.php'; </script>";
$adminEmail = $_SESSION['adminLoginEmail'];
// echo '<script> alert("'.$adminEmail.'"); </script>';


?>