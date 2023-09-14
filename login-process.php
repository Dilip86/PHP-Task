<?php
session_start();

// Include database connection
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate user input
    if (empty($email) || empty($password)) {
        $_SESSION["login_error"] = "Please enter both email and password.";
        header("location: login.php");
        exit();
    }

    // Check if the user exists in the database
    $sql = "SELECT id, name, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, log the user in
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_name"] = $row["name"];
            header("location: dashboard.php"); // Redirect to a dashboard or home page
        } else {
            $_SESSION["login_error"] = "Invalid password.";
            header("location: login.php");
        }
    } else {
        $_SESSION["login_error"] = "Invalid email or user not found.";
        header("location: login.php");
    }

    $stmt->close();
}
?>
