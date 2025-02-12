<?php
if(!isset($_SESSION)){
    session_start();
}

include('./admininclude/header.php'); 
include('../dbConnection.php');
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];

} else{
    echo "<script> location.href='../index.php';</script>";
}
?>

<div class="col-sm-9 mt-5">
    <p class="bg-dark text-white p-2">List of Courses</p>
    <?php
    $stmt = "SELECT * FROM course";
    $result = $conn->query($stmt);
    if ($result->num_rows > 0) {
    ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Courses ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <th scope="row"><?php echo $row['course_id']; ?></th>
        <td><?php echo $row['course_name']; ?></td>
        <td><?php echo $row['course_author']; ?></td>
        <td>
            <!-- Edit Form -->
            <form action="editcourse.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value="<?php echo $row['course_id']; ?>">
                <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                    <i class="fas fa-pen"></i>
                </button>
            </form>

            <!-- Delete Form -->
            <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value="<?php echo $row['course_id']; ?>">
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
        $course_id = intval($_POST['id']);
        $stmt = "DELETE FROM course WHERE course_id = $course_id";
        if ($conn->query($stmt) === TRUE) {
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        } else {
            echo "Unable to Delete Data";
        }
    }
    ?>
</div>
<div>
    <a class="btn btn-danger box" href="./addCourse.php"><i class="fas fa-plus fa-2x"></i></a>
</div>

<?php
include('./admininclude/footer.php');
?>
