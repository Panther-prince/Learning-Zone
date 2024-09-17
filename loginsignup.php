<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Include CSS -->
    <?php
    include("./dbconn.php");
    include("./Main-Includes/addcss.php");
    ?>

</head>

<body>

    <!-- Include Navbar -->
    <?php
    include("./Main-Includes/navbar.php")
    ?>

    <!-- Start Main Content -->

    <div class="d-flex justify-content-center" style="padding-top: 150px;">

        <!-- Login Container -->

        <div style="width: 40%; padding:10px">
            <div>
                <h5>If Already Registered !! Login</h5>

            </div>
            <div>
                <form id="stdLoginForm">
                    <div class="form-group">
                        <i class="fa-solid fa-envelope mr-2"></i><label for="stdLoginEmail">Email address</label>
                        <input type="email" class="form-control" id="stdLoginEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                        </small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key mr-2"></i><label for="stdLoginPass">Password</label>
                        <input type="password" class="form-control" id="stdLoginPass" placeholder="Create Password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <small id="statusLogMsg"></small>
                <button type="button" onclick="checkStdLogin()" id="stdLoginBtn" class="btn btn-primary"> Login </button>
            </div>
        </div>

        <!-- Sign Up Container  -->

        <div style="width: 40%; padding:10px">
            <div>
                <h5>New User !! Sign Up</h5>
            </div>
            <div>
                <form id="stdRegiForm">
                    <div class="form-group">
                        <i class="fas fa-user mr-2"></i><label for="stdRegiName">Name </label>
                        <small id="regi_name"></small>
                        <input type="text" class="form-control" id="stuname" aria-describedby="emailHelp" placeholder="Enter Name">

                        <i class="fa-solid fa-envelope mr-2"></i><label for="stdRegiEmail">Email address</label>
                        <small id="regi_email"></small>
                        <input type="email" class="form-control" id="stuemail" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key mr-2"></i><label for="stdRegiPass">Password</label>
                        <small id="regi_pass"></small>
                        <input type="password" class="form-control" id="stupass" placeholder="Create Password">
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <small id="statusSignUpMsg"></small>
                <button type="button" onclick="addStd()" id="stdSignUpBtn" class="btn btn-primary">Sign Up</button>
            </div>
        </div>
    </div>





    <!-- Include Footer -->
    <?php
    include("./Main-Includes/footer.php")
    ?>
</body>

</html>