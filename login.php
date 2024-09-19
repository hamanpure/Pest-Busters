<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Database connection
    $host = 'localhost';
    $username_db = 'root';
    $password_db = '';
    $database = 'registration';

    // Create connection
    $conn = new mysqli($host, $username_db, $password_db, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query the database for the user with the provided email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            // Password matches, set up session data
            $_SESSION["user_id"] = $row["id"]; // Store the user ID or relevant data in the session

            // Redirect to a logged-in user's page (e.g., dashboard)
            header("Location: services.html");
            exit();
        } else {
            // Password doesn't match, handle the login failure
            echo "Invalid credentials. Please try again.";
        }
    } else {
        // User not found, handle the login failure
        echo "Invalid credentials. Please try again.";
    }

    $conn->close();
}
?>
