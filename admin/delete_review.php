<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$host = "localhost";
$username = "Maya";
$password = "xqeXXyp*-RePcD(R";
$database = "Maya";


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_review'])) {
    $reviewId = $_POST['review_id'];

    $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $reviewId);


    if ($stmt->execute()) {
        echo "Review deleted successfully.";
    } else {
        echo "Error deleting review: " . $conn->error;
    }


    $stmt->close();
} else {
    echo "Invalid request.";
}


$conn->close();

// Redirect back 
header("Location: admin_reviews.php");
exit;
?>
