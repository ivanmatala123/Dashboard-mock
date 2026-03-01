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

        $fullname = $_POST['firstname'] . " " . $_POST["lastname"];
        $email = $_POST["email"];
        $phonenumber = $_POST["phonenumber"];
        $role = $_POST["role"];
        $status = "inactive";

        $stmt = $conn->prepare(
            "INSERT INTO tbl_users(fullname, email, phonenumber, role, status) VALUES (?,?,?,?,?)"
        );

        $stmt->bind_param("sssss", $fullname, $email, $phonenumber, $role, $status);

        if ($stmt->execute()) {

            $_SESSION['message'] = "User successfully added!";
            $_SESSION['alert'] = "success";
        } else {

            $_SESSION['message'] = "Failed to add user!";
            $_SESSION['alert'] = "danger";
        }

        $stmt->close();
    }

    $conn->close();
    header("Location: ../dashboard.php");
    exit();
}
