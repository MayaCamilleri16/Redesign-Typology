
<?php
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


$messageId = isset($_GET['id']) ? $_GET['id'] : '';


$stmt = $conn->prepare("SELECT * FROM contact_messages WHERE id = ?");
$stmt->bind_param("i", $messageId);
$stmt->execute();
$result = $stmt->get_result();
$message = $result->fetch_assoc();

//  reply to the message
if ($message) {
    echo "<h2>Reply to Message</h2>";
    echo "<form action='send_reply.php' method='post'>";
    echo "<input type='hidden' name='message_id' value='{$message['id']}'>";
    echo "<input type='hidden' name='email' value='{$message['email']}'>";
    echo "<textarea name='reply' rows='4' required></textarea>";
    echo "<button type='submit'>Send Reply</button>";
    echo "</form>";
} else {
    echo "Message not found.";
}
?>
