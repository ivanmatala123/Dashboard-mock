<?php
require __DIR__ . '/../database/db.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (
        empty($_POST['firstname']) ||
        empty($_POST['lastname']) ||
        empty($_POST['email']) ||
        empty($_POST['phonenumber'])
    ) {
        $_SESSION["message"] = "Fill up all the fields";
        $_SESSION["alert"] = "danger";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["message"] = "Input a proper email.";
        $_SESSION["alert"] = "danger";
    } else {
        $id = $_POST["id"];
        $fullname = $_POST['firstname'] . " " . $_POST["lastname"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $role = $_POST["role"];

        $stmt = $conn->prepare(
            "UPDATE tbl_users SET fullname = ?, email = ?, phonenumber = ?, role =?   WHERE id = ?"
        );

        $stmt->bind_param("ssssi", $fullname, $email, $phonenumber, $role, $id);

        if ($stmt->execute()) {

            $_SESSION['message'] = "User successfully edit!";
            $_SESSION['alert'] = "success";
        } else {

            $_SESSION['message'] = "Failed to edit user!";
            $_SESSION['alert'] = "danger";
        }

    }

    $conn->close();
    header("Location: ../dashboard.php");
    exit();
}
