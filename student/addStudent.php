<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('../dbconn.php');
// check email already exist or not 
// below code not work 
if (isset($_POST['stuemail'])) {
    $stuemail = $_POST['stuemail'];
    $sql = "SELECT stu_email FROM student WHERE stu_email = '" . $stuemail . "'";
    $result = $con->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
}
//------------

// insert student
if (isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])) 
{
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];

    $sql = "INSERT INTO student(stu_name,stu_email,stu_pass) VALUES('$stuname','$stuemail','$stupass')";
    if ($con->query($sql)) {
        $_SESSION['is_login'] = true;
        $_SESSION['stdLoginEmail'] = $stuemail;
        echo json_encode("Ok");
    } else {
        echo json_encode("Failed");
    }
}


// Student Login Verification 
if (!isset($_SESSION['is_login'])) {

    if (isset($_POST['stdLoginEmail']) && isset($_POST['stdLoginPass'])) {
        $stdLoginEmail = $_POST['stdLoginEmail'];
        $stdLoginPass = $_POST['stdLoginPass'];

        $sql = "SELECT stu_id, stu_email, stu_pass FROM student WHERE stu_email ='" . $stdLoginEmail . "' AND stu_pass = '" . $stdLoginPass . "'";

        $result = $con->query($sql);
        $row = $result->num_rows;

        if ($row === 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['stdLoginEmail'] = $stdLoginEmail;
            echo json_encode($row);
        } else if ($row === 0) {
            echo json_encode($row);
        }
    }
}
