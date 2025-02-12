<?php

include('./admininclude/header.php'); 
include('../dbConnection.php');

if (!isset($_SESSION)) {
    session_start();
}

$row = []; // Initialize $row to avoid undefined variable warnings

// Fetch Lesson Details for Update
if (isset($_REQUEST['lesson_id']) && !empty($_REQUEST['lesson_id'])) {
    $id = $_REQUEST['lesson_id'];
    $stmt = $conn->prepare("SELECT * FROM lesson WHERE lesson_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Only fetch the lesson if it exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Redirect to lessons list if lesson is not found
        header("Location: lessons.php");
        exit();
    }
    $stmt->close();
}

// Handle Lesson Update
if (isset($_REQUEST['requpdate'])) {
    if (empty($_REQUEST['lesson_name']) || empty($_REQUEST['lesson_desc'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
    } else {
        $lname = $_REQUEST['lesson_name'];
        $ldesc = $_REQUEST['lesson_desc'];
        $cid = $_REQUEST['course_id'];

        // Handle file upload for lesson link (video)
        if (!empty($_FILES['lesson_link']['name'])) {
            $llink = '../lessonvid/' . basename($_FILES['lesson_link']['name']);
            if (move_uploaded_file($_FILES['lesson_link']['tmp_name'], $llink)) {
                // File uploaded successfully
            } else {
                $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Upload Lesson Video</div>';
                $llink = isset($row['lesson_link']) ? $row['lesson_link'] : ''; // Keep the existing link if upload fails
            }
        } else {
            $llink = isset($row['lesson_link']) ? $row['lesson_link'] : ''; // Keep the existing link if no new file is uploaded
        }

        // Update query
        $stmt = $conn->prepare("UPDATE lesson SET lesson_name = ?, lesson_desc = ?, lesson_link = ? WHERE lesson_id = ?");
        $stmt->bind_param("sssi", $lname, $ldesc, $llink, $id);

        if ($stmt->execute()) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Update Successful</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
        }
        $stmt->close();
    }
}

// Handle Lesson Deletion
if (isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];
    $stmt = $conn->prepare("DELETE FROM lesson WHERE lesson_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success col-sm-6 ml-5 mt-2">Lesson Deleted Successfully</div>';
        header("Location: lessons.php");
        exit();
    } else {
        echo '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Delete Lesson</div>';
    }
    $stmt->close();
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lesson Detail</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson-id">Lesson ID</label>
            <input type="text" class="form-control" name="lesson_id" 
                   value="<?php echo $row['lesson_id'] ?? ''; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson-name">Lesson Name</label>
            <input type="text" class="form-control" name="lesson_name" 
                   value="<?php echo $row['lesson_name'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="lesson-desc">Lesson Description</label>
            <textarea class="form-control" name="lesson_desc"><?php echo $row['lesson_desc'] ?? ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="course-id">Course ID</label>
            <input type="text" class="form-control" name="course_id" 
                   value="<?php echo $row['course_id'] ?? ''; ?>" readonly>
        </div>

        <div class="form-group text-center mt-4">
            <button type="submit" class="btn btn-success" name="requpdate">Update</button>

            <!-- Delete Button with check for lesson_id -->
            <?php if (isset($row['lesson_id'])): ?>
                <a href="editlesson.php?delete_id=<?php echo $row['lesson_id']; ?>" class="btn btn-danger" 
                   onclick="return confirm('Are you sure you want to delete this lesson?');">
                    Delete
                </a>
            <?php else: ?>
                <button class="btn btn-danger" disabled>Delete</button>
            <?php endif; ?>

            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>

<?php if (isset($msg)) { echo $msg; } ?>
