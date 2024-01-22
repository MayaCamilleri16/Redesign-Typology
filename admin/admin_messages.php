
<?php
session_start();
$host = "localhost";
$dbUser = "Maya"; 
$dbPassword = "xqeXXyp*-RePcD(R"; 
$database = "Maya";

$conn = new mysqli($host, $dbUser, $dbPassword, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$result = $conn->query("SELECT * FROM contact_messages ORDER BY timestamp DESC");


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='message'>";
        echo "<p><strong>Name:</strong> {$row['name']}</p>";
        echo "<p><strong>Email:</strong> {$row['email']}</p>";
        echo "<p><strong>Subject:</strong> {$row['subject']}</p>";
        echo "<p><strong>Message:</strong> {$row['message']}</p>";
        // Include a form or link to reply to the message
        echo "<a href='reply_to_message.php?id={$row['id']}'>Reply</a>";
        echo "</div>";
    }
} else {
    echo "No messages found.";
}
?>
