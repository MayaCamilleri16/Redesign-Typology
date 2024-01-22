<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "Maya";
$password = "xqeXXyp*-RePcD(R";
$database = "Maya";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['support_request_id']) && isset($_POST['admin_reply'])) {
        $supportRequestId = $_POST['support_request_id'];
        $adminReply = $_POST['admin_reply'];
        
       
        $insertSql = "INSERT INTO SupportRequestReplies (SupportRequestID, AdminReply, Timestamp) VALUES (?, ?, NOW())";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("is", $supportRequestId, $adminReply);
        
        if ($insertStmt->execute()) {
            // Redirect back 
            header("Location: view_request.php?id=$supportRequestId&success=1");

            exit();
        } else {
            echo "Error inserting admin reply: " . $insertStmt->error;
        }
    } else {
        echo "Invalid data submitted.";
    }
}

?>