document.getElementById("messageForm").addEventListener("submit", function (event) {
    event.preventDefault();
    const message = document.getElementById("message").value;

    // Send an AJAX request to the server
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send_message.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Clear the input field after the message is sent
            document.getElementById("message").value = "";
            // Update the chat messages
            displayMessages(chat_room_id);
        }
    };
    xhr.send("chat_room_id=" + chat_room_id + "&content=" + encodeURIComponent(message));
});

function displayMessages(chat_room_id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "get_messages.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("messages").innerHTML = xhr.responseText;
        }
    };
    xhr.send("chat_room_id=" + chat_room_id);
}

displayMessages(chat_room_id);
setInterval(() => displayMessages(chat_room_id), 5000); // Refresh chat messages every 5 seconds