<!-- Start Student Registration Modal  -->
<div class="modal fade" id="stdRegiModal" tabindex="-1" role="dialog" aria-labelledby="stdRegiModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Student Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    <button type="button" onclick="addStd()" id="stdSignUpBtn"class="btn btn-primary">Sign Up</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Student Registration Modal  -->

    <!-- Start Student Login Modal  -->

    <div class="modal fade" id="stdLoginModal" tabindex="-1" role="dialog" aria-labelledby="stdLoginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Student Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Student Login Modal  -->

    <!-- Start Admin Login Modal  -->

    <div class="modal fade" id="adminLoginModal" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Admin Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="adminLoginForm">
                        <div class="form-group">
                            <i class="fa-solid fa-envelope mr-2"></i><label for="adminLoginEmail">Email address</label>
                            <input type="email" class="form-control" id="adminLoginEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key mr-2"></i><label for="adminLoginPass">Password</label>
                            <input type="password" class="form-control" id="adminLoginPass" placeholder="Create Password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <small id="statusAdminLogMsg"></small>
                    <button type="button" onclick="checkAdminLogin()" id="adminLoginBtn" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Admin Login Modal  -->