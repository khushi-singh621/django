<?php
include('./admininclude/header.php'); 
include('../dbConnection.php');

$row = []; // Initialize $row to avoid undefined variable warnings

if (isset($_REQUEST['view']) && isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $stmt = "SELECT * FROM course WHERE course_id = '$id'";
    $result = $conn->query($stmt);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-warning">No course found with the provided ID.</div>';
    }
}

if (isset($_REQUEST['requpdate'])) {
    if (
        empty($_REQUEST['course_id']) || 
        empty($_REQUEST['course_name']) || 
        empty($_REQUEST['course_desc']) || 
        empty($_REQUEST['course_author']) || 
        empty($_REQUEST['course_duration']) || 
        empty($_REQUEST['course_price']) || 
        empty($_REQUEST['course_original_price'])
    ) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $cid = $_REQUEST['course_id'];
        $cname = $_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cauthor = $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
        
        // Handle image upload
        if (!empty($_FILES['course_img']['name'])) {
            $cimg = '../images/courseimg/' . basename($_FILES['course_img']['name']);
            move_uploaded_file($_FILES['course_img']['tmp_name'], $cimg);
        } else {
            $cimg = $_REQUEST['existing_image']; 
        }

        // Update query
        $stmt = "UPDATE course SET 
                    course_name = '$cname', 
                    course_desc = '$cdesc', 
                    course_author = '$cauthor', 
                    course_duration = '$cduration', 
                    course_price = '$cprice', 
                    course_original_price = '$coriginalprice', 
                    course_img = '$cimg' 
                 WHERE course_id = '$cid'";

        if ($conn->query($stmt) === TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Update Successful</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Course Detail</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="existing_image" value="<?php echo $row['course_img'] ?? ''; ?>">
        <div class="form-group">
            <label for="course-id">Course ID</label>
            <input type="text" class="form-control" name="course_id" 
                   value="<?php echo $row['course_id'] ?? ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course-name">Course Name</label>
            <input type="text" class="form-control" name="course_name" 
                   value="<?php echo $row['course_name'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="course-desc">Course Description</label>
            <textarea class="form-control" name="course_desc"><?php echo $row['course_desc'] ?? ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="course-author">Author</label>
            <input type="text" class="form-control" name="course_author" 
                   value="<?php echo $row['course_author'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="course-duration">Course Duration</label>
            <input type="text" class="form-control" name="course_duration" 
                   value="<?php echo $row['course_duration'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="course-price">Course Price</label>
            <input type="text" class="form-control" name="course_price" 
                   value="<?php echo $row['course_price'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="course-original-price">Course Original Price</label>
            <input type="text" class="form-control" name="course_original_price" 
                   value="<?php echo $row['course_original_price'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="course-img">Course Image</label>
            <?php if (!empty($row['course_img'])): ?>
                <img src="<?php echo $row['course_img']; ?>" class="img-thumbnail" width="200">
            <?php else: ?>
                <p>No image available</p>
            <?php endif; ?>
            <input type="file" class="form-control-file" name="course_img">
            <div class="text-center">
            <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if (isset($msg)) { echo $msg; } ?>
    </form>
</div>
