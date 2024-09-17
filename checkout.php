<?php 
include("./dbconn.php");

session_start();
if(!isset($_SESSION['stdLoginEmail'])){
    echo "<script> location.href = 'loginsignup.php' </script>";
}

$stdLoginEmail = $_SESSION["stdLoginEmail"];
$sql = "SELECT * FROM student WHERE stu_email= '". $_SESSION['stdLoginEmail'] . "'";
$result = $con->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuEmail = $row["stu_email"];
    $stuName = $row["stu_name"];
    
}

if (isset($_REQUEST['orderClicked'])) {
  echo "<script> console.log('Order Clicked') </script>";
  if (($_REQUEST['amount'] == "")){
      $msg = '<div class ="alert alert-warning col-sm-6 ml-5 mt-2">All Fields are not Filled, Please Try Again Purchasing </div>';
  }
  else {
      $order_id = $_REQUEST['order_id'];
      $stu_id = $stuId;
      $stu_email = $stuEmail;
      $course_id = $_SESSION['course_id'];
      $amount = $_REQUEST['amount'];
      date_default_timezone_set('Asia/Kolkata');
      $date = date("Y-m-d H:i:s");

      $sql = "INSERT INTO courseorder(order_id, stu_id, stu_email, course_id, amount, order_date) VALUES ('$order_id','$stu_id','$stu_email','$course_id','$amount','$date')";

      if($con->query($sql)==true) {
          $msg = '<div class ="alert alert-success col-sm-6 ml-5 mt-2">Purchase Successfully.</div>';
          echo "<script> setTimeout(() => { window.location.href = './student/myCourse.php';}, 1500); </script>";
      } else {
          $msg = '<div class ="alert alert-danger col-sm-6 ml-5 mt-2">Purchase Failed</div>';
      }
  }
} 



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Checkout Page</title>
  <?php
    include("./Main-Includes/addcss.php");
  ?>
</head>

<body>

<div class="container mt-5">
  <div class="row">
    <div class="col-sm-6 offset-sm-3 jumbotron" style="background-color: #a7cbe2b5;">
      <h3 class="mb-5 titleStyle"> Welcome to E-learning Payment Page</h3>
      <form action="" method="post">
        <div class="form-group row">
          <label for="order_id" class="col-sm-4 col-form-label"> Order ID </label>
          <div class="col-sm-8">
            <input id="order_id" class="form-control" tabindex="1" maxlength="20" size="20" name="order_id" autocomplete="off"
              value="<?php echo "ORDS" .rand(10000,999999) ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="stu_name" class="col-sm-4 col-form-label"> Student Name </label>
          <div class="col-sm-8">
          <input id="stu_name" class="form-control" tabindex="2" name="stu_name" autocomplete="off"
            value="<?php if(isset($stuName)){ echo $stuName; } ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="stu_email" class="col-sm-4 col-form-label"> Student Email </label>
          <div class="col-sm-8">
          <input id="stu_email" class="form-control" tabindex="2" name="stu_email" autocomplete="off"
            value="<?php if(isset($stuEmail)){ echo $stuEmail; } ?>" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label for="amount" class="col-sm-4 col-form-label"> Amount </label>
          <div class="col-sm-8">
          <input id="amount" class="form-control" tabindex="10" type="text" name="amount" 
            value="<?php if(isset($_POST['price'])){ echo $_POST['price']; } ?>" readonly>
          </div>
        </div>

        <div class="text-center">
          <input type="submit" class="btn btn-primary btnCol" value="Check out" onclick="" id="orderClicked" name="orderClicked">
          <a href="./courses.php" class="btn btn-secondary">Cancel</a>
        </div>

      </form>
      <small class="form-text text-muted">Note : Complete Payment by Clicking Checkout Button</small>
      <?php if (isset($msg)) {
                        echo $msg;
                    }
                    ?>

    </div>
  </div>

</div>


</body>

</html>