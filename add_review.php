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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reviewerName = $_POST['reviewer_name'];
    $rating = intval($_POST['rating']);
    $comment = $_POST['comment'];
    $productId = $_POST['product_id']; 
    
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, reviewer_name, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $productId, $reviewerName, $rating, $comment); 

    if ($stmt->execute()) {
        // Review added 
        header("Location: product_details.php?id=$productId&source=$source");
        exit();
    } else {
        echo "Error adding review: " . $stmt->error;
    }

    $stmt->close();
}
