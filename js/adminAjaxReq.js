//Admin Login Verification
function checkAdminLogin(){
    
    var adminLoginEmail = $("#adminLoginEmail").val();
    var adminLoginPass = $("#adminLoginPass").val();
    
    $.ajax({
        
        url:"admin/admin.php",
        method : "POST",
        data :{
            adminLoginEmail : adminLoginEmail,
            adminLoginPass : adminLoginPass
        },
        success: function(data){
            if(data == 0){
                console.log("Invalid")
                console.log(adminLoginEmail)
                console.log(adminLoginPass)
                $("#statusAdminLogMsg").html(
                    '<small class="alert alert-danger"> Invalid Email Id or Password </small>'
                    );
            }
            else if(data == 1){
                console.log("Valid")
                console.log(adminLoginEmail)
                console.log(adminLoginPass)
                $("#statusAdminLogMsg").html(
                    '<small class="alert alert-success"> Login Success... </small>'
                );
                setTimeout(() => {
                    window.location.href = "admin/adminDashboard.php";
                }, 1000);

            }
        }
    });
}