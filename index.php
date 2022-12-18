<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iSchool</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet" />

    <!-- Custom Style -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <!--Start Navbar-->
    <nav class="navbar navbar-expand-lg pl-5 fixed-top">
        <a class="navbar-brand" href="index.php">iSchool</a>
        <span class="navbar-text" style="color: rgb(160, 160, 160);">Learn and Implement</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav custom-nav">
                <li class="nav-item custom-nav-item active">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#">Courses</a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#">Payment</a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#">MyProfile</a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#">Logout</a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#">Signup</a>
                </li>
                <li class="nav-item custom-nav-item ">
                    <a class="nav-link" href="#">Feedback</a>
                </li>
            </ul>
        </div>
    </nav>
    <!--End Navbar-->


    <!-- start back video -->
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="video/Oggy 1.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
            <div class="center-vid-content">
                <h1 class="my-content">Welcome to iSchool</h1>
                <small class="my-content">Learn and Implement</small>
                <a href="#" class="btn btn-danger">Get Started</a>
            </div>
        </div>
    </div>
    <!-- end back video -->

    <!-- strat text bannner-->
    <div class="container-fluid bg-danger txt-banner">
        <div class="row button-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i> 100+ Online Cources</h5>
            </div>

            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i> Expert Instuctors</h5>
            </div>

            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fa-solid fa-indian-rupee-sign mr-3"></i> Money Back Guarantee*</h5>
            </div>
        </div>
    </div>
    <!-- end text bannner-->

    <!--start cources popular-->
    <div class="container mt-5">
        <h1 class="text-center">Popular Courses</h1>
        
        <!--card start-->
        <div class="card-deck mt-4">
            <a href="#" class="btn" style="text-align: left; padding: 0px; margin: 0px;">
                <div class="card">
                    <img src="image/YellowBuddy.jpg" class="card-img-top" alt="No Img" />
                    <div class="card-body">
                        <h5 class="card-title">Python</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. saepe laborem</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price :<small><del>&#8377 200</del></small></p>
                        <span class="font-weight-bolder">&#8377 200 </span>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img src="image/YellowBuddy.jpg" class="card-img-top" alt="No Img" />
                    <div class="card-body">
                        <h5 class="card-title">Python</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. saepe laborem</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price :<small><del>&#8377 200</del></small></p>
                        <span class="font-weight-bolder">&#8377 200 </span>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0px;">
                <div class="card">
                    <img src="image/YellowBuddy.jpg" class="card-img-top" alt="No Img" />
                    <div class="card-body">
                        <h5 class="card-title">Python</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. saepe laborem</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price :<small><del>&#8377 200</del></small></p>
                        <span class="font-weight-bolder">&#8377 200 </span>
                        <a class="btn btn-primary text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                </div>
            </a>
        </div>
        <!--card end-->


        <!--end cources popular-->
        <!--start more cources -->
        <div class="text-center m-2">
            <a class="btn btn-danger btn-sm" href="#">View all Courses</a>
        </div>
    </div>
    <!--end more cources Popular -->

    <!-- Start Contact Us -->
    <div class="container mt-4" id="Contact">
        <!--  Start Container -->
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">
            <!-- Start Contact Us Row -->
            <div class="col-md-8">
                <!-- Start Contact Us 1st Column -->
                <form action="" method="post">
                    <input type="text" class="form-control" name="name" placeholder="Name"><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
                    <input type="text" class="form-control" name="email" placeholder="Email"><br>
                    <textarea class="form-control" name="message" placeholder="How can we help you?" style="height: 150px;"></textarea><br>
                    <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
                </form>
            </div> <!-- End Contact Us 1st Column -->
            <div class="col-md-4 stripe text-white text-center">
                <!-- Start Contact Us 2nd Column -->
                <h4> I-School</h4>
                <p>
                    Hello <br>
                    Yellow <br>
                    Phone No : 1234567890 <br>
                    Website : www.thatisischooo
                </p>
            </div> <!-- End Contact Us 2nd Column -->
        </div> <!-- End Contact Us Row -->
        <!--  End Container -->
    </div>
    <!-- End Contact Us -->

    <!-- Start Social Media Follow -->
    <!-- strat text bannner-->
    <div class="container-fluid bg-danger">
        <div class="row text-white text-center">
            <div class="col">
                <a class="text-white social-hover" href="#">
                    <i class="fa-brands fa-facebook"></i> Facebook 
                </a>
            </div>
            <div class="col">
                <a class="text-white social-hover" href="#"><i class="fa-brands fa-twitter"></i> Twitter </a>
            </div>
            <div class="col">
                <a class="text-white social-hover" href="#"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a>
            </div>
            <div class="col">
                <a class="text-white social-hover" href="#"><i class="fa-brands fa-instagram"></i> Instagram </a>
            </div>
        </div>
    </div>
    <!-- end text bannner-->

    <!-- End Social Media Follow -->


    <!--start footer -->
    <div class="container-fluid p-4" style="background-color: #E9ECEF">
        <div class="container" style="background-color: #E9ECEF">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam dignissimos vero, aliquam molestias, repellat cupiditate consequuntur doloribus, ullam error doloremque sunt perferendis! Labore distinctio ipsum cum, unde est dolore aut.</p>
                </div>
                <div class="col-sm">
                    <h5>Categories</h5>
                    <a class="text-dark" href="">Web Development</a></br>
                    <a class="text-dark" href="">Web Designing</a></br>
                    <a class="text-dark" href="">Android App Dev</a></br>
                    <a class="text-dark" href="">ios Development</a></br>
                    <a class="text-dark" href="">Data Analysis</a></br>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>ischool Pvt Ltd</br> Near Police Camp II</br> Bokaro, Gujrat </br> Ph. 0000000000</p>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2022 || Designed by Pranay, Vasudev & Prince || Admin Login</small>
    </footer>
    <!--end footer -->

    <!-- Link JQuery and Bootstrap Javascripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>