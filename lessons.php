<?php
if (!isset($_SESSION)) {
    session_start();
}
include('./admininclude/header.php');
include('../dbConnection.php');

// Admin login verification
if (!isset($_SESSION['is_admin_login'])) {
    echo "<script> location.href='../index.php'; </script>";
    exit();
} else {
    $adminEmail = $_SESSION['adminLogEmail'];
}
?>
<div class="col-sm-9 mt-5 mx-3">
    <form action="" method="post" class="mt-3 form-inline" d-print-none>
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID</label>
            <input type="text" name="checkid" class="form-control ml-3" id="checkid">
        </div>
        <button type="submit" class="btn btn-danger">Search</button>
    </form>

    <?php
    if (isset($_POST['checkid']) && !empty($_POST['checkid'])) {
        $checkid = $_POST['checkid'];
        $stmt = $conn->prepare("SELECT * FROM course WHERE course_id = ?");
        $stmt->bind_param("s", $checkid);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $_SESSION['course_id'] = $row['course_id'];
            $_SESSION['course_name'] = $row['course_name'];
            ?>
            <h3 class="mt-5 bg-dark text-white p-2">
                Course ID: <?php echo $row['course_id']; ?> 
                Course Name: <?php echo $row['course_name']; ?>
            </h3>
            <?php
        } else {
            echo "<p class='mt-3'>Course ID not found</p>";
        }
        $stmt->close();
    }

    if (isset($_SESSION['course_id']) && !empty($_SESSION['course_id'])) {
        $stmt = $conn->prepare("SELECT * FROM lesson WHERE course_id = ?");
        $stmt->bind_param("s", $_SESSION['course_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        echo '<table class="table">
        <thead>
        <tr>
        <th scope="col">Lesson ID</th>
        <th scope="col">Lesson Name</th>
        <th scope="col">Lesson Link</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="row">' . $row["lesson_id"] . '</th>';
            echo '<td>' . $row["lesson_name"] . '</td>';
            echo '<td><a href="../lessonvid/' . $row["lesson_link"] . '" target="_blank">View Video</a></td>';
            echo '<td>
                <form action="" method="POST" class="d-inline">
                    <input type="hidden" name="lesson_id" value="' . $row["lesson_id"] . '">
                    <button type="submit" class="btn btn-danger btn-sm" name="delete" value="Delete">
                        Delete
                    </button>
                </form>
                <a href="editLesson.php?lesson_id=' . $row["lesson_id"] . '" class="btn btn-info btn-sm">
                    Edit
                </a>
            </td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        $stmt->close();
    }
    ?>

    <?php
    if (isset($_SESSION['course_id'])) {
        echo '<div>
        <a class="btn btn-danger box" href="addLesson.php"><i class="fas fa-plus fa-2x"></i></a>
        </div>';
    }
    include('./admininclude/footer.php');

    if (isset($_POST['delete'])) {
        $lesson_id = $_POST['lesson_id'];
        $stmt = $conn->prepare("DELETE FROM lesson WHERE lesson_id = ?");
        $stmt->bind_param("i", $lesson_id);

        if ($stmt->execute()) {
            echo "<script>alert('Lesson Deleted Successfully');</script>";
            // Redirect to avoid form resubmission
            header("Location: " . $_SERVER['PHP_SELF'] . "?deleted=1");
            exit();
        } else {
            echo "<script>alert('Unable to delete lesson');</script>";
        }
        $stmt->close();
    }

    // Show a success message if redirected after deletion
    if (isset($_GET['deleted']) && $_GET['deleted'] == 1) {
        echo "<p class='alert alert-success mt-3'>Lesson Deleted Successfully</p>";
    }
    ?>
</div>
