<?php
session_start();
include_once('../dbConnection.php');

// Check if the user is logged in
if (!isset($_SESSION['is_login'])) {
    echo "<script> location.href='../index.php';</script>";
    exit;
}

$stuEmail = $_SESSION['stuLogEmail'];

// Fetch student image securely
$stmt = $conn->prepare("SELECT stu_img FROM student WHERE stu_email = ?");
$stmt->bind_param("s", $stuEmail);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
} else {
    $stu_img = 'default.jpg';  // Use a default image if none is found
}
$stmt->close();
?>
<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="studentProfile.php">E-Learning</a>
</nav>
<div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <nav class="col-sm-2 bg-light slidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <img src="<?php echo $stu_img; ?>" alt="Student Image" class="img-thumbnail rounded-circle">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myCourse.php">
                            <i class="fab fa-accessible-icon"></i> My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stufeedback.php">
                            <i class="fab fa-accessible-icon"></i> Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentChangePass.php">
                            <i class="fas fa-key"></i> Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
