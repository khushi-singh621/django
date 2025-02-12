<?php
if (!isset($_SESSION)) {
    session_start();
}

include('./admininclude/header.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
}
?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Students</p>
    <?php
    $stmt = "SELECT * FROM student";
    $result = $conn->query($stmt);
    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <th scope="row"><?php echo $row['stu_id']; ?></th>
                        <td><?php echo $row['stu_name']; ?></td>
                        <td><?php echo $row['stu_email']; ?></td>
                        <td>
                            <!-- Edit Form -->
                            <form action="editstudent.php" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $row['stu_id']; ?>">
                                <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </form>

                            <!-- Delete Form -->
                            <form action="" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?php echo $row['stu_id']; ?>">
                                <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "0 Results";
    }

    if (isset($_POST['delete']) && isset($_POST['id'])) {
        $student_id = intval($_POST['id']); // Corrected variable name
        $stmt = "DELETE FROM student WHERE stu_id = $student_id"; // Corrected column name
        if ($conn->query($stmt) === TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        } else {
            echo "Unable to Delete Data: " . $conn->error; // Added error message for debugging
        }
    }
    ?>
</div>
<div>
    <a class="btn btn-danger box" href="./addnewstudent.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('./admininclude/footer.php');
?>
