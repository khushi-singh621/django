<?php
session_start();
include('./stuInclude/header.php');
include_once('../dbConnection.php');

// Check if the user is logged in
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='../index.php'; </script>";
    exit;
}

$stuEmail = $_SESSION['stuLogEmail'];

// Fetch student details
$stmt = $conn->prepare("SELECT * FROM student WHERE stu_email = ?");
$stmt->bind_param("s", $stuEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_img"];
}

if (isset($_REQUEST['updateStuNameBtn'])) {
    if (!empty($_REQUEST['stuName']) && !empty($_REQUEST['stuOcc'])) {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];
        $stu_image = $_FILES['stuImg']['name'];
        $stu_image_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../image/stu/' . $stu_image;

        if (!empty($stu_image)) {
            move_uploaded_file($stu_image_temp, $img_folder);
        } else {
            $img_folder = $stuImg;
        }

        $update_stmt = $conn->prepare("UPDATE student SET stu_name = ?, stu_occ = ?, stu_img = ? WHERE stu_email = ?");
        $update_stmt->bind_param("ssss", $stuName, $stuOcc, $img_folder, $stuEmail);
        if ($update_stmt->execute()) {
            $passmsg = '<div class="alert alert-success">Update Successfully</div>';
        } else {
            $passmsg = '<div class="alert alert-danger">Unable to Update</div>';
        }
        $update_stmt->close();
    } else {
        $passmsg = '<div class="alert alert-warning">Fill All Fields</div>';
    }
}
?>
<div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" name="stuId" value="<?php echo $stuId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail">Email</label>
            <input type="email" class="form-control" value="<?php echo $stuEmail; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Name</label>
            <input type="text" class="form-control" name="stuName" value="<?php echo $stuName; ?>">
        </div>
        <div class="form-group">
            <label for="stuOcc">Occupation</label>
            <input type="text" class="form-control" name="stuOcc" value="<?php echo $stuOcc; ?>">
        </div>
        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <input type="file" class="form-control-file" name="stuImg">
        </div>
        <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
        <?php if (isset($passmsg)) { echo $passmsg; } ?>
    </form>
</div>
<?php include('./admininclude/footer.php'); ?>
