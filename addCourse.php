<?php

include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_REQUEST['courseSubmitBtn'])) {
    // Checking for empty fields
    if (
        empty($_REQUEST['course_name']) || 
        empty($_REQUEST['course_desc']) || 
        empty($_REQUEST['course_author']) || 
        empty($_REQUEST['course_duration']) || 
        empty($_REQUEST['course_price']) || 
        empty($_REQUEST['course_original_price'])
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $course_name = $_REQUEST['course_name'];
        $course_desc = $_REQUEST['course_desc'];
        $course_author = $_REQUEST['course_author'];
        $course_duration = $_REQUEST['course_duration'];
        $course_price = $_REQUEST['course_price'];
        $course_original_price = $_REQUEST['course_original_price'];
        $course_image = $_FILES['course_img']['name'];
        $course_image_temp = $_FILES['course_img']['tmp_name'];
        $img_folder = '../images/courseimg/' . $course_image;

        // Move the uploaded file to the designated folder
        move_uploaded_file($course_image_temp, $img_folder);

        // Insert query
        $stmt = "INSERT INTO course (course_name, course_desc, course_author, course_img, course_duration, course_price, course_original_price) 
                 VALUES ('$course_name', '$course_desc', '$course_author', '$img_folder', '$course_duration', '$course_price', '$course_original_price')";

        if ($conn->query($stmt) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course-name">Course Name</label>
            <input type="text" class="form-control" name="course_name">
        </div>
        <div class="form-group">
            <label for="course-desc">Course Description</label>
            <textarea class="form-control" name="course_desc" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label for="course-author">Author</label>
            <input type="text" class="form-control" name="course_author">
        </div>
        <div class="form-group">
            <label for="course-duration">Course Duration</label>
            <input type="text" class="form-control" name="course_duration">
        </div>
        <div class="form-group">
            <label for="course-price">Course Price</label>
            <input type="text" class="form-control" name="course_price">
        </div>
        <div class="form-group">
            <label for="course-original-price">Course Original Price</label>
            <input type="text" class="form-control" name="course_original_price">
        </div>
        <div class="form-group">
            <label for="course-img">Course Image</label>
            <input type="file" class="form-control-file" name="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) { echo $msg; } ?>
    </form>
</div>

<?php include('./admininclude/footer.php'); ?>
