<?php
require __DIR__ . '/../database/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $id = $_POST["id"];
    $statement = "DELETE FROM tbl_users WHERE tbl_users. id = ?";
    $stmt = $conn->prepare($statement);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "User successfully deleted";
        $_SESSION['alert'] = "success";
    } else {
        $_SESSION['message'] = "User failed to be deleted";
        $_SESSION['alert'] = "danger";
    }

    $stmt->close();
    $conn->close();
    header("Location: ../dashboard.php");
    exit();
}
