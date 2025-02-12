<?php
include_once('../dbConnection.php');

// Checking if email is already registered
if (isset($_POST['checkemail']) && isset($_POST['stuemail'])) {
    $stuemail = $_POST['stuemail'];
    $stmt = $conn->prepare("SELECT stu_email FROM student WHERE stu_email = ?");
    $stmt->bind_param("s", $stuemail);
    $stmt->execute();
    $stmt->store_result();
    $row = $stmt->num_rows;
    echo $row; // Output the number of rows directly
    $stmt->close(); // Add this to properly close the statement
}

// Handling student signup
if (isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])) {
    $stuname = $_POST['stuname'];
    $stuemail = $_POST['stuemail'];
    $stupass = $_POST['stupass'];

    $stmt = $conn->prepare("INSERT INTO student (stu_name, stu_email, stu_pass) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $stuname, $stuemail, $stupass);

    if ($stmt->execute()) {
        echo json_encode("OK");
    } else {
        echo json_encode("Failed: " . $stmt->error);
    }

    $stmt->close(); // Add this to properly close the statement
}

// Student login verification
if (isset($_POST['checkLogemail']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])) {
    $stuLogEmail = $_POST['stuLogEmail'];
    $stuLogPass = $_POST['stuLogPass'];

    $stmt = $conn->prepare("SELECT stu_email, stu_pass FROM student WHERE stu_email = ? AND stu_pass = ?");
    $stmt->bind_param("ss", $stuLogEmail, $stuLogPass);
    $stmt->execute();
    $stmt->store_result();
    $row = $stmt->num_rows;

    if ($row === 1) {
        echo json_encode($row);
        $_SESSION['is_login']=true;
        $_SESSION['stuLogEmail']=s;
    } else {
        echo json_encode(0);
    }

    $stmt->close(); // Add this to properly close the statement
}

$conn->close();
?>
