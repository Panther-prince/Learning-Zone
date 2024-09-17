<?php 
$host = "localhost";
$user = "root";
$password ="";
$dbname = "test";

//connection
$con = new mysqli ($host,$user,$password,$dbname);
if($con->connect_errno){
    die("Connection Failed");
}
?>