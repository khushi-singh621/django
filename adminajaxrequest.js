function checkAdminLogin() {
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();
    $.ajax({
        url: 'Admin/admin.php',
        method: 'POST',
        data: {
            checkLogemail: "checklogmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
        success: function (data) {
            var response = JSON.parse(data);
            if (response == 0) {
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email or Password!</small>');
            } else if (response == 1) {
                $("#statusAdminLogMsg").html('<small class="alert alert-success">Success Loading..!</small>');
                setTimeout(() => {
                    window.location.href = "Admin/adminDashboard.php";
                }, 1000);
            }
        },
    });
}
