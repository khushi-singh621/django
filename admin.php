<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once('../dbConnection.php');

// Admin login verification
if (!isset($_SESSION['is_admin_login'])) {
    if (isset($_POST['checkLogemail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])) {
        $adminLogEmail = $_POST['adminLogEmail'];
        $adminLogPass = $_POST['adminLogPass'];

        $stmt = $conn->prepare("SELECT admin_email, admin_pass FROM admin WHERE admin_email = ? AND admin_pass = ?");
        $stmt->bind_param("ss", $adminLogEmail, $adminLogPass);
        $stmt->execute();
        $stmt->store_result();
        $row = $stmt->num_rows;

        if ($row === 1) {
            $_SESSION['is_admin_login'] = true;
            $_SESSION['adminLogEmail'] = $adminLogEmail;
            echo json_encode($row);
        } else {
            echo json_encode(0);
        }
        $stmt->close(); // Close the statement
    }
}
?>
