$(document).ready(function () {
    $("#stuemail").on("keypress blur", function () {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i; // Wrap #stuemail in quotes
        var stuemail = $("#stuemail").val(); // Correct ID selector
        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function (data) {
                if (data != 0) {
                    $("#statusMsg2").html('<small style="color:red;"> Email Already Used!</small>');
                    $("#signup").attr("disabled", true);
                } else if (data == 0 && reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:green;"> There you go!</small>');
                    $("#signup").attr("disabled", false);
                } else if (!reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:red;"> Please Enter Valid Email e.g. example@gmail.com !</small>');
                    $("#signup").attr("disabled", false);
                }
                if (stuemail == "") {
                    $("#statusMsg2").html('<small style="color:red;"> Please Enter Email!</small>');
                } else {
                    $("#statusMsg2").html('<small style="color:green;"> Email is Available!</small>');
                    $("#signup").attr("disabled", false);
                }
            },
        });
    });
});

function addStu() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();
    //checking for fields on submission
    if (stuname.trim() == "") {
        $("#statusMsg1").html('<small style="color:red;">Please Enter Name !</small>');
        $("#stuname").focus();
        return false;
    } else if (stuemail.trim() == "") {
        $("#statusMsg2").html('<small style="color:red;">Please Enter Email !</small>');
        $("#stuemail").focus();
        return false;
    } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg2").html('<small style="color:red;">Please Enter Valid Email e.g. example@gmail.com !</small>');
        $("#stuemail").focus();
        return false;
    } else if (stupass.trim() == "") {
        $("#statusMsg3").html('<small style="color:red;">Please Enter Password !</small>');
        $("#stupass").focus();
        return false;
    } else {
        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            dataType: "json",
            data: {
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass,
            },
            success: function (data) {
                console.log(data);
                if (data == "OK") {
                    $("#successMsg").html("<span class='alert alert-success'>Registration Successful !</span>");
                    clearStuRegField();
                } else if (data == "Failed") {
                    $("#successMsg").html("<span class='alert alert-danger'>Unable to Register</span>");
                }
            },
        });
    }
}

function clearStuRegField() {
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}

//ajax call for students login verification
function checkStuLogin() {
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();
    $.ajax({
        url: "Student/addstudent.php",
        method: "POST",
        data: {
            checkLogemail: "checklogmail",
            stuLogEmail: stuLogEmail,
            stuLogPass: stuLogPass,
        },
        success: function (data) {
    console.log(data); 
    if (data == 0) {
        $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email and Password</small>');
    } else if (data == 1) {
    $("#statusLogMsg").html('<div class="spinner-border text-success" role="status"></div>');
    setTimeout(function () {
        $("#statusLogMsg").html('<small class="alert alert-success">Login Successful!</small>');
    }, 2000); 
                   
               
            }
        },
    });
}

