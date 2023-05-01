<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chat_room_id = $_POST['chat_room_id'];

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

    // Retrieve the messages for the specified chat room
    $query = "SELECT messages.id, messages.content, messages.created_at, users.username
              FROM messages
              INNER JOIN users ON messages.user_id = users.id
              WHERE messages.chat_room_id = '$chat_room_id'
              ORDER BY messages.created_at ASC";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "Error: " . mysqli_error($connection);
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<strong>" . htmlspecialchars($row['username']) . ":</strong> "
                 . htmlspecialchars($row['content'])
                 . " <span>(" . date("H:i", strtotime($row['created_at'])) . ")</span><br>";
        }
    }

    // Close the connection
    mysqli_close($connection);
}
?>