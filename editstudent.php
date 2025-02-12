<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./admininclude/header.php'); 
include('../dbConnection.php');

$row = []; // Initialize $row to avoid warnings

if (isset($_REQUEST['view']) && isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    $stmt = "SELECT * FROM student WHERE stu_id = '$id'"; // Ensure table & column names match database
    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-warning">No student found with the provided ID.</div>';
    }
}

if (isset($_REQUEST['requpdate'])) {
    if (empty($_REQUEST['stu_id']) || empty($_REQUEST['stu_name']) || empty($_REQUEST['stu_email']) || empty($_REQUEST['stu_pass']) || empty($_REQUEST['stu_occ'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $stu_id = intval($_REQUEST['stu_id']);
        $stu_name = $_REQUEST['stu_name'];
        $stu_email = $_REQUEST['stu_email'];
        $stu_pass = $_REQUEST['stu_pass'];
        $stu_occ = $_REQUEST['stu_occ'];

        // Update query
        $stmt = "UPDATE student SET 
                    stu_name = '$stu_name', 
                    stu_email = '$stu_email', 
                    stu_pass = '$stu_pass', 
                    stu_occ = '$stu_occ' 
                 WHERE stu_id = '$stu_id'";

        if ($conn->query($stmt) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Update Successful</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student Detail</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="stu_id">ID</label>
            <input type="text" name="stu_id" class="form-control" id="stu_id" value="<?php if(isset($row['stu_id'])) echo $row['stu_id']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" name="stu_name" class="form-control" id="stu_name" value="<?php if(isset($row['stu_name'])) echo $row['stu_name']; ?>">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" name="stu_email" class="form-control" id="stu_email" value="<?php if(isset($row['stu_email'])) echo $row['stu_email']; ?>">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" name="stu_pass" class="form-control" id="stu_pass" value="<?php if(isset($row['stu_pass'])) echo $row['stu_pass']; ?>">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" name="stu_occ" class="form-control" id="stu_occ" value="<?php if(isset($row['stu_occ'])) echo $row['stu_occ']; ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) echo $msg; ?>
    </form>
</div>
