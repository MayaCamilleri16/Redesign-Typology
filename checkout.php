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


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    
    header("Location: cart.php");
    exit;
}


function getProductInfo($conn, $id) {
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        return false;
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}


$total_price = 0;
$products = array(); 

foreach ($_SESSION['cart'] as $id) {
    $product = getProductInfo($conn, $id);
    if ($product) {
        $total_price += $product['price'];
        $products[] = $product; 
    }
}


$shipping_cost = ($total_price < 100) ? 10 : 0;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typology - Checkout</title>
  

    <style>
        /* Add your CSS styles here */
        body {
            font-family: "Maven Pro", sans-serif;
            display: flex;
            justify-content: space-between;
        }
        .left-side {
            width: 50%;
            padding: 20px;
        }
        .right-side {
            width: 50%;
            padding: 20px;
        }
        .contact-section, .shipping-section {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .products-section {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .discount-section {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .total-section {
            background-color: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="left-side">
        <h1>Typology</h1> 
        <div class="contact-section">
            <h2>Contact</h2> 
            <form action="process_payment.php" method="post">
                <!-- Email  -->
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <br>
                <!-- Receive updates checkboxes -->
                <label for="receive_updates">Receive updates, news, and offers via email:</label>
                <input type="checkbox" name="receive_updates" id="receive_updates">
            </form>
        </div>
        <div class="shipping-section">
            <h2>Shipping Address</h2>
            <form action="process_payment.php" method="post">
                <!-- Shipping address fields -->
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" required>
                <br>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" required>
                <br>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" required>
                <br>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
                <br>
                <label for="apartment">Apartment:</label>
                <input type="text" name="apartment" id="apartment">
                <br>
                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>
                <br>
                <label for="postal_code">Postal Code:</label>
                <input type="text" name="postal_code" id="postal_code" required>
                <br>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" required>
                <br>
                <!-- Save address checkbox -->
                <label for="save_info">Save this info:</label>
                <input type="checkbox" name="save_info" id="save_info">
            </form>
        </div>
    </div>
    <div class="right-side">
        <div class="products-section">
            <h2>Products</h2>
            <?php
       
            foreach ($products as $product) {
                echo "<div class='product'>";
                echo "<p>" . $product['name'] . "</p>";
                echo "<p>$" . number_format($product['price'], 2) . "</p>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="discount-section">
            <h2>Discount Code</h2>
            <!-- Discount code and apply button -->
            <input type="text" name="discount_code" id="discount_code" placeholder="Enter discount code">
            <button type="button" id="apply_discount">Apply</button>
        </div>
        <div class="total-section">
    <!-- Total price and shipping -->
    <h2>Total</h2>
    <p>Total Price: £<?php echo number_format($total_price, 2); ?></p>
    <p>Shipping: £<?php echo number_format($shipping_cost, 2); ?></p>
    <p>Final Total: £<?php echo number_format($total_price + $shipping_cost, 2); ?></p>
</div>

    </div>
    <!-- Continue to Shipping and Return to Cart buttons -->
    <div style="text-align: center;">
        <button type="button" id="return_to_cart" onclick="window.location.href = 'cart.php';">Return to Cart</button>
        <button type="button" id="continue_to_shipping">Continue to Shipping</button>
    </div>
</body>
</html>