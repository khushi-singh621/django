<?php


include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_REQUEST['newStuSubmitBtn'])) {
    // Checking for empty fields
    if (
        empty($_REQUEST['stu_name']) || 
        empty($_REQUEST['stu_email']) || 
        empty($_REQUEST['stu_pass']) || 
        empty($_REQUEST['stu_occ'])
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

        // Insert query
        $stmt = "INSERT INTO student (stu_name, stu_email, stu_pass, stu_occ)
                 VALUES ('$stu_name', '$stu_email', '$stu_pass', '$stu_occ')";

        if ($conn->query($stmt) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Student</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" name="stu_name" class="form-control" id="stu_name">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" name="stu_email" class="form-control" id="stu_email">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" name="stu_pass" class="form-control" id="stu_pass">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" name="stu_occ" class="form-control" id="stu_occ">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg; } ?>
    </form>
</div>



<?php include('./admininclude/footer.php'); ?>
