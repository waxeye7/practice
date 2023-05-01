<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $chat_room_id = $_POST['chat_room_id'];
    $content = $_POST['content'];

    // Connect to the database
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $database = 'chat_app';
    $connection = mysqli_connect($host, $dbusername, $dbpassword, $database);

    // Check if the connection is successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert the message into the messages table
    $query = "INSERT INTO messages (chat_room_id, user_id, content) VALUES ('$chat_room_id', '$user_id', '$content')";
    if (!mysqli_query($connection, $query)) {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }

    // Close the connection
    mysqli_close($connection);
}
?>