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

function getProductInfo($mysqli, $id) {
    $stmt = $mysqli->prepare("SELECT * FROM Byedit WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        $product = null;
    }
    $stmt->close();
    return $product;
}

$orderDetails = $_SESSION['order_details'] ?? ['products' => [], 'total' => 0];


$total = 0;
$products = [];
foreach ($orderDetails['products'] as $productId) {
    $product = getProductInfo($conn, $productId);
    if ($product) {
        $products[] = $product;
        $total += $product['price'];
    }
}


$_SESSION['order_details'] = ['products' => $products, 'total' => $total];

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <style>
        .container {
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }
        .order-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .order-summary {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .total-price {
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="order-header">
        <h1>Order Confirmation</h1>
        <p>Thank you for your purchase!</p>
    </div>

    <div class="order-summary">
        <h2>Your Order</h2>
        <ul>
            <?php foreach ($orderDetails['products'] as $product): ?>
                <li><?php echo htmlspecialchars($product['name']); ?> - $<?php echo number_format($product['price'], 2); ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="total-price">
            Total: $<?php echo number_format($orderDetails['total'], 2); ?>
        </div>
    </div>

    <div class="footer">
        <p>If you have any questions about your order, please contact us at support@typology.com.</p>
    </div>
</div>

</body>
</html>
