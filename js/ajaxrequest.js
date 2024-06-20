$(document).ready(function () {
    // Ajax Call for Already Exists Email Verification
    $("#studemail").on("keypress blur", function () {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var studemail = $("#studemail").val();
        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            data: {
                checkemail: "checkmail",
                semail: studemail,
            },
            success: function (data) {
                //console.log(data);
                if (data != 0) {
                    $("#statusMsg2").html("<small style='color:red;'>Email ID Already Used !</small>");
                    $("#studRegisterBtn").attr("disabled", true);
                } else if(data == 0 && reg.test(studemail)){
                    $("#statusMsg2").html("<small style='color:Green;'>There you Go !</small>");
                    $("#studRegisterBtn").attr("disabled", false);
                } else if(!reg.test(studemail)){
                    $("#statusMsg2").html("<small style='color:red;'>Please Enter Valid Email e.g. example@gmail.com !</small>");
                    $("#studRegisterBtn").attr("disabled", true);
                }
            },
        });
    });
    
});

function addStud() {
    var studname = $("#studname").val();
    var studemail = $("#studemail").val();
    var studpass = $("#studpass").val();

    // Checking Form Fields On Form Submission
    if (studname.trim() == "") {
        $("#statusMsg1").html("<small style='color:red;'>Please Enter Name</small>");
        $("#studname").focus();
        return false;
    } else if (studemail.trim() == "") {
        $("#statusMsg2").html("<small style='color:red;'>Please Enter Email</small>");
        $("#studemail").focus();
        return false;
    } else if (studpass.trim() == "") {
        $("#statusMsg3").html("<small style='color:red;'>Please Enter Password</small>");
        $("#studpass").focus();
        return false;
    } else {
        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            dataType: "json",
            data: {
                sregister: "studregister",
                sname: studname,
                semail: studemail,
                spass: studpass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $('#successMsg').html("<span class='alert alert-success'>Registration Successful</span>");
                    clearStudRegField();
                } else if (data == "Failed") {
                    $('#successMsg').html("<span class='alert alert-danger'>Unable to Register</span>");
                }
            }
        })
    }
}

// Empty All Fields and Status Messages
function clearStudRegField() {
    $("#studRegisterForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}


// Ajax Call for Student Login Verification
function checkStudLogin(){
    var studLogEmail = $("#studlogemail").val();
    var studLogPass = $("#studlogpass").val();
    $.ajax({
        url: 'Student/addstudent.php',
        method: 'POST',
        data:{
            checkLogemail: "checklogmail",
            studLogEmail:studLogEmail,
            studLogPass:studLogPass,
        },
        success:function(data){
            if(data == 0){
                $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }else if(data == 1){
                $("#statusLogMsg").html('<small class="alert alert-success">Login Success !</small>');
                window.location.href = "index.php";
            }
        }
    })
}
