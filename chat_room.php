<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (!isset($_GET['chat_room_id'])) {
    header("Location: chat.php");
    exit;
}

$chat_room_id = intval($_GET['chat_room_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
    <style>
        #messages {
            height: 300px;
            border: 1px solid #000;
            overflow-y: scroll;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Chat Room</h1>
    <div id="messages"></div>
    <form id="messageForm">
        <input type="text" id="message" placeholder="Type your message here" required>
        <button type="submit">Send</button>
    </form>
    <script>
        const user_id = <?php echo $_SESSION['user_id']; ?>;
        const chat_room_id = <?php echo $chat_room_id; ?>;
    </script>
    <script src="chat.js"></script>
</body>
</html>