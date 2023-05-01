<?php
session_start();

// Connect to the database
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$database = 'practicedb';
$connection = mysqli_connect($host, $dbusername, $dbpassword, $database);

// Check if the connection is successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the submitted username and password from the form
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

// Retrieve the user's data from the database
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    // Fetch the user's data
    $user = mysqli_fetch_assoc($result);

    // Verify the submitted password against the stored hashed password
    if (password_verify($password, $user['password'])) {
        // Start a new session and store the user's ID and username
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to the welcome page
        header("Location: welcome.php");
        exit;
    } else {
        // Display an error message for an incorrect password
        echo "Incorrect password. Please try again.";
    }
} else {
    // Display an error message for a non-existent username
    echo "Username not found. Please try again.";
}

// Close the connection
mysqli_close($connection);
?>