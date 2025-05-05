<?php
session_start();
// Database connection settings
$servername = "localhost";
$username = "root";  // Default XAMPP username for MySQL
$password = "";      // Default XAMPP password for MySQL
$dbname = "auth_system"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_input = $_POST['username'];
    $pass_input = $_POST['password'];

    // SQL query to check the entered username and password
    $sql = "SELECT * FROM superuser WHERE username = '$user_input' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, now check the password
        $row = $result->fetch_assoc();
        $stored_password = $row['password']; // Assuming the passwords are stored in plain text

        if ($pass_input == $stored_password) {
            // Password matches, redirect to the dashboard
            header("Location: all-link.php");
            $_SESSION['username'] = $user_input;
            exit;
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username not found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super User Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h2>SuperUser Login</h2>
    <form method="POST" action="superuserlogin.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login"><br><br>
    </form>
    
    <img id="footer-image" src="padlock.jpg" alt="Graduation Cap and Scroll">
    

</body>
</html>
