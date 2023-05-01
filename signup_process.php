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

// Hash the password before storing it in the database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if the username already exists
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Username already exists. Please choose a different one.";
} else {
    // Insert the new user into the database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($connection, $query)) {
        // Get the ID of the newly created user
        $user_id = mysqli_insert_id($connection);

        // Start a session and store the user's ID and username
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;

        // Redirect to the welcome page
        header("Location: welcome.php");
        exit;
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
}

// Close the connection
mysqli_close($connection);
?>