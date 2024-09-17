<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Include CSS -->
    <?php
    include("./Main-Includes/addcss.php");
    ?>

</head>

<body>

    <!-- Include Navbar -->
    <?php
    include("./Main-Includes/navbar.php")
    ?>

    <!-- Start Payment Status Page Banner -->
    <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./image/space.webp" alt="Courses" style="height: 500px; width:100%; object-fit:cover; box-shadow: 10px;">
        </div>
    </div>
    <!-- End Payment status Page Banner -->


    <!-- Start Main Content -->
    <div class="container">
        <h2 class="text-center my-4">Payment Status</h2>
        <form action="" method="post">
            <div class="form-group row">
                <label for="" class="offset-sm-3 col-form-label">Order ID : </label>
                <div>
                    <input type="text" class="form-control mx-3">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary mx-4" value="View">
                </div>
            </div>
        </form>
    </div>

    <!-- Include Contact Us -->
    <?php
    include("./contactus.php")
    ?>
    <!-- End Main Content -->

    <!-- Include Models -->
    <?php
    include("./modals.php");
    ?>

    <!-- Include Footer -->
    <?php
    include("./Main-Includes/footer.php")
    ?>
</body>

</html>