
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


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $messageId = $_POST['message_id'];
    $email = $_POST['email'];
    $reply = $_POST['reply'];


    $to = $email;
    $subject = "Reply from Your Website";
    $headers = "From: support@typology.com";


    if (mail($to, $subject, $reply, $headers)) {
        echo "Reply sent successfully.";
    } else {
        echo "Failed to send reply.";
    }
}
?>
