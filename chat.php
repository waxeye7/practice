<?php
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

// Retrieve all chat rooms from the database
$query = "SELECT * FROM chat_rooms";
$result = mysqli_query($connection, $query);

$chat_rooms = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $chat_rooms[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Rooms</title>
</head>
<body>
    <h1>Chat Rooms</h1>
    <ul>
        <?php foreach ($chat_rooms as $chat_room) : ?>
            <li>
                <a href="chat_room.php?chat_room_id=<?php echo $chat_room['id']; ?>">
                    <?php echo htmlspecialchars($chat_room['name']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>