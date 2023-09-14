<?php
// Include database connection
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO users (name, email, password, address, phone) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $password, $address, $phone);
    
    if ($stmt->execute()) {
        header("location: login.php");
    } else {
        echo "Registration failed. Please try again.";
    }

    $stmt->close();
}
?>
