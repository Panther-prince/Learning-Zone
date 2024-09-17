// below code not work  video 23 : 40


    $(document).ready(function(){
        $("#stuemail").on("keypress blur",function(){
            var stuemail = $("#stuemail").val();
            $.ajax({
                url:"student/addStudent.php",
                method: "POST",
                data:{
                    stuemail:stuemail
                },
                success: function(data){
                    if(data == "Ok"){
                        $("#regi_email").html('<span style="color:red">Email Already Used !</span>');
                        $("#sign_up").attr("disable",true);
                    }
                    else if(data == "Fiald"){
                        $("#regi_email").html('<span style="green">there you go </span>');
                        $("#sign_up").attr("disable",false);
                    }
                }
            });
        });
    });


//============================//
function addStd() {
    console.log("addstd() Called");
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // check data
    if(stuname.trim()==""){
        $("#regi_name").html('<small style="color:red">Please Enter Name !</small>');

        $("#regi_pass").html('');
        $("#regi_email").html('');
        return false;
    }
    else if(stuemail.trim()==""){
        $("#regi_email").html('<small style="color:red">Please Enter Email !</small>');

        $("#regi_name").html('');
        $("#regi_pass").html('');
        return false;
    }
    else if(!stuemail.trim()=="" && !reg.test(stuemail)){
        $("#regi_email").html('<small style="color:red">Please Enter Valid Email e.g. abc@mail.com !</small>');

        $("#regi_name").html('');
        $("#regi_pass").html('');
        return false;
    }
    else if(stupass.trim()==""){
        $("#regi_pass").html('<small style="color:red">Please Enter Password !</small>');

        $("#regi_email").html('');
        $("#regi_name").html('');
        return false;
    }
    else{
        $("#regi_pass").html('');
        $("#regi_email").html('');
        $("#regi_name").html('');

        $.ajax({
            url: 'student/addStudent.php',
            type: 'POST',
            data: {
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass
            },
            success: function (data) {
                console.log("Success is run");
                if(!stuname == "" || !stuemail == "" || !stupass == ""){
                    console.log("Reg Success");
                    $("#statusSignUpMsg").html("<small class='alert alert-success'> Registration Successful !</small>");
                    setTimeout(() => {
                        window.location.href = "index.php"
                    }, 1000);
                }
                else{
                    console.log("Reg Failed");
                    $("#statusSignUpMsg").html("<small class='alert alert-danger'>Registration Failed !</small>");
                    clearfilds();
                }
            }
        });
    }
}
// clear all filds at the end success
function clearfilds(){
    $("#stdRegiForm").trigger("reset");
    $("#stuname").html(" ");
    $("#stuemail").html(" ");
    $("#stupass").html(" ");

}

//Student Login Verification
function checkStdLogin(){
    console.log("Check Std Login Run Successfully");
    var stdLoginEmail = $("#stdLoginEmail").val();
    var stdLoginPass = $("#stdLoginPass").val();
    
    $.ajax({
        url:"student/addStudent.php",
        method : "POST",
        data :{
            stdLoginEmail : stdLoginEmail,
            stdLoginPass : stdLoginPass
        },
        success: function(data){
            if(data == 0){
                console.log("Invalid")
                $("#statusLogMsg").html(
                    '<small class="alert alert-danger"> Invalid Email Id or Password </small>'
                    )
            }
            else if(data == 1){
                console.log("Valid")
                $("#statusLogMsg").html(
                    '<small class="alert alert-success"> Login Success... </small>'
                );
                setTimeout(() => {
                    window.location.href = "index.php"
                }, 1000);
            }
        }
    });
}
