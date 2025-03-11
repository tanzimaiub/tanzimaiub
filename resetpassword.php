<?php
include 'tanziuserconnect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $new_password = $_POST['new_password'];

    // Check if the username exists
    $sql_check = "SELECT * FROM users1 WHERE username = '$username'";
    $result = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        // Update password
        $sql_update = "UPDATE users1 SET password = '$new_password' WHERE username = '$username'";
        if (mysqli_query($con, $sql_update)) {
            echo "Password updated successfully! <a href='logincss.php'>Login</a>";
        } else {
            echo "Error updating password: " . mysqli_error($con);
        }
    } else {
        echo "Username not found!";
    }
}
$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>

    <h2>Reset Your Password</h2>
    <form action="resetpassword.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required> <br><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required> <br><br>

        <button type="submit">Reset Password</button>
    </form>

</body>
</html>
