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
//============================
function addStd() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    // check data
    if(stuname.trim()==""){
        $("#regi_name").html('<small style="color:red">Please Enter Name !</small>');
        return false;
    }
    else if(stuemail.trim()==""){
        $("#regi_email").html('<small style="color:red">Please Enter Email !</small>');
        return false;
    }
    else if(!stuemail.trim()=="" && !reg.test(stuemail)){
        $("#regi_email").html('<small style="color:red">Please Enter Valid Email e.g. abc@mail.com !</small>');
        return false;
    }
    else if(stupass.trim()==""){
        $("#regi_pass").html('<small style="color:red">Please Enter Password !</small>');
        return false;
    }
    else{
        $.ajax({
            url: 'student/addStudent.php',
            type: 'POST',
            dataType:"json",
            data: {
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass
            },
            success: function (data) {
                console.log(data);
                if(!stuname=="" && !stuemail=="" && !stupass==""){
                    $("#regi_err").html("<span class='alert alert-success'>Registration Successfully !</span>");
                    clearfilds();
                }
                else if(data=="Faild"){
                    $("#regi_err").html("<span class='alert alert-danger'>Registration Fiald !</span>");
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

// function checkStdLogin() {
//     console.log("Login clecked");
//     var stdLoginEmail =$("#stdLoginEmail").val();
//     var stdLoginPass =$("#stdLoginPass").val();
//     $.ajax({
//         url: 'student/addStudent.php',
//         method: post,
//         data: {
//             stdLoginEmail : stdLoginEmail,
//             stdLoginPass :stdLoginPass
//         },
//         success: function(data){
//             console.log(data);
//         }
//     });
// }

//student Login verification
function checkStdLogin(){
    var stdLoginEmail = $("#stdLoginEmail").val();
    var stdLoginPass = $("#stdLoginPass").val();

    $.ajax({
        type: JSON,
        url: "student/addStudent.php",
        method : "POST",
        data : {
            stdEmail : stdLoginEmail,
            stdPass : stdLoginPass
        },
        success :function(data){
            console.log("Success");
            console.log(data);
            if(data == 0){
                $();
            }
        }
    });
}
