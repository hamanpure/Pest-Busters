<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["Username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

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

    // Query the database for existing email
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        // Email already exists, handle the registration failure
        echo "Email already registered. Please use a different email.";
    } else {
        // Insert data into the database
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        if ($conn->query($insertQuery) === TRUE) {
            // Registration successful, redirect to a success page
            header("Location: login.php");
            exit();
        } else {
            // Handle the case of a registration failure
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
