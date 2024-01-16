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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $productId = $_POST['product_id'];

        $stmt = $conn->prepare("INSERT INTO UserFavorites (UserID, ProductID) VALUES (?, ?)");

        if ($stmt) {
            $stmt->bind_param("ii", $userId, $productId);

            if ($stmt->execute()) {
                echo "Product added to favorites successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "User is not logged in.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
