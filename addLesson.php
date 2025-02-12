<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./admininclude/header.php');
include('../dbConnection.php');

// Admin login verification
if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
    exit(); // Ensure the script stops execution
}

if (isset($_REQUEST['lessonSubmitBtn'])) {
    if (empty($_REQUEST['lesson_name']) || empty($_REQUEST['lesson_desc']) || empty($_REQUEST['course_id']) || empty($_REQUEST['course_name'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $lesson_name = $_REQUEST['lesson_name'];
        $lesson_desc = $_REQUEST['lesson_desc'];
        $course_id = $_REQUEST['course_id'];
        $course_name = $_REQUEST['course_name'];
        $lesson_link = $_FILES['lesson_link']['name'];
        $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
        $img_folder = '../lessonvid/' . $lesson_link;

        // Move the uploaded file to the designated folder
        if (move_uploaded_file($lesson_link_temp, $img_folder)) {
            // Insert query
            $stmt = $conn->prepare("INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $lesson_name, $lesson_desc, $lesson_link, $course_id, $course_name);

            if ($stmt->execute()) {
                $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Added Successfully</div>';
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Lesson</div>';
            }
            $stmt->close();
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Upload Lesson Video</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course-id">Course ID</label>
            <input type="text" class="form-control" name="course_id" value="<?php if (isset($_SESSION['course_id'])) {echo $_SESSION['course_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course-name">Course Name</label>
            <input type="text" class="form-control" name="course_name" value="<?php if (isset($_SESSION['course_name'])) {echo $_SESSION['course_name'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" class="form-control" name="lesson_name" id="lesson_name">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Video</label>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="lessonSubmitBtn" id="lessonSubmitBtn">Submit</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) { echo $msg; } ?>
    </form>
</div>

<?php
include('./admininclude/footer.php');
?>
