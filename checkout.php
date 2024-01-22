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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_shipping'])) {
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM Shipping WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt = $conn->prepare("UPDATE Shipping SET first_name = ?, last_name = ?, address = ?, city = ?, postal_code = ?, country = ?, phone = ?, email = ? WHERE user_id = ?");
        $stmt->bind_param("ssssssssi", $first_name, $last_name, $address, $city, $postal_code, $country, $phone, $email, $user_id);
    } else {
        $stmt = $conn->prepare("INSERT INTO Shipping (user_id, first_name, last_name, address, city, postal_code, country, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssssss", $user_id, $first_name, $last_name, $address, $city, $postal_code, $country, $phone, $email);
    }
    $stmt->execute();
    $stmt->close();

   
}


$shipping_info = null;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM Shipping WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $shipping_info = $result->fetch_assoc();
    }
    $stmt->close();
}


function getProductInfo($mysqli, $id) {
    $stmt = $mysqli->prepare("SELECT * FROM Byedit WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();

    return $product;
}

//  calculate total
function calculateTotal($products) {
    $total = 0;
    foreach ($products as $product) {
        $total += $product['price'];
    }
    return $total;
}

$product_ids = $_SESSION['cart'] ?? [];
$products = [];

// Fetch product details for each product ID from the 'Byedit' table
foreach ($product_ids as $id) {
    $product = getProductInfo($conn, $id);
    if ($product) {
        $products[] = $product;
    }
}


$email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : '';

$shipping_address = isset($_SESSION['shipping_address']) ? htmlspecialchars($_SESSION['shipping_address']) : '';

// Calculate the total price
$total_price = calculateTotal($products);
$shipping_cost = ($total_price < 100) ? 10 : 0;


define('PROMO_CODE', 'PROMO5EURO');
define('DISCOUNT_AMOUNT', 5.00);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['discount_code'])) {
    
    $entered_promo_code = $_POST['discount_code'];

   
    if ($entered_promo_code === PROMO_CODE) {
        // Apply the discount
        $total_price -= DISCOUNT_AMOUNT;
    } else {
        // Handle the case where the promo code is not valid
        $error_message = "Invalid promo code.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page Layout</title>
  

    <style>
        
        body {
            font-family: "Maven Pro", sans-serif;
            display: flex;
            justify-content: space-between;
        }
     
        .contact-section, .shipping-section {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .products-section {
            padding: 10px;
            margin-bottom: 20px;
        }
        .discount-section {
            padding: 10px;
            margin-bottom: 20px;
        }
        .total-section {
            padding: 10px;
        }

   


        body {
            font-family: "Maven Pro", sans-serif;
            padding: 20px;
        }

      
        .checkout-container {
            display: flex;
            justify-content: space-between;
        }

       
        .left-side {
    width: 50%;
    padding: 20px;
    background-color: white; 
}

.right-side {
    width: 50%;
    padding: 20px;
    background-color: #ffeef8; 
}


        .left-side, .right-side {
            width: calc(50% - 10px);
            margin-right: 10px; 
        }
        
    
      
        .section {
    
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

   
        label, input, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
     
        #continue_to_shipping {
    padding: 10px 15px;
    font-size: 14px; 
    background-color: black; 
    color: white;
    border: none;
    border-radius: 4px; 
    text-transform: uppercase; 
    letter-spacing: 1px; 
    margin: 10px auto;
            display: block;
            
}

#return_to_cart {
    background-color: black; 
    color: black; 
    padding: 10px 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: black; 
    background-color: transparent;
    border: 1px solid #ffeef8; 
    margin-right: auto;
    margin: 10px auto;
            display: block;           
}


.button-container {
    position: relative; 
    bottom: initial;
    left: initial;
    width: auto; 
    padding: 20px; 
    background: none;
    border-top: none; 
}
.button {
    display: inline-block;
    padding: 10px 20px;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    color: #fff;
    background-color: #000; 
    text-decoration: none;
    border: none;
    cursor: pointer;
}  

    </style>

</head>
<body>
<div class="left-side">
    <h1><a href="index.php" style="text-decoration: none; color: inherit;">Typology.</a></h1>
        <div class="contact-section">
            <h2>Contact</h2> 
            <form action="shipping.php" method="post">
                <!-- Email  -->
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <br>
                
                <label for="receive_updates">Receive updates, news, and offers via email:</label>
                <input type="checkbox" name="receive_updates" id="receive_updates">
            </form>
        </div>
        
        <div class="shipping-section">
        <h2>Shipping Address</h2>
        <form action="shipping.php" method="post" id="checkout_form">
          
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
                <label for="save_info">Save this info:</label>
            <input type="checkbox" name="save_info" id="save_info">
            <br>
            
            <div class="button-container">
    <a href="cart.php" class="button" id="return_to_cart">Return to Cart</a>
    <a href="shipping.php" class="button" id="continue_to_shipping">Continue to Shipping</a>
</div>

        </form>
    </div>
</div>
<div class="right-side">
    <div class="products-section">
        <h2>Products</h2>
        <?php foreach ($products as $product): ?>
            <div class='product'>
            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" style="width:100px; height:auto;"> <!-- Adjust the width as needed -->
                <p><?php echo htmlspecialchars($product['name']); ?></p>
                <p>£<?php echo number_format($product['price'], 2); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="discount-section">
    <h2>Discount Code</h2>
    <form id="promo_code_form" method="post" action="checkout.php">
        <input type="text" name="discount_code" id="discount_code" placeholder="Enter discount code">
        <input type="submit" value="Apply">
    </form>
</div>
</form>

     <!-- Total Section -->
     <div class="total-section">
        <h2>Total</h2>
        <p>Total Price: £<?php echo number_format($total_price, 2); ?></p>
        <p>Shipping: £<?php echo number_format($shipping_cost, 2); ?></p>
        <p>Final Total: £<?php echo number_format($total_price + $shipping_cost, 2); ?></p>
    </div>
</div>

<!-- Shipping info display -->
<?php if ($shipping_info): ?>
    <div class="shipping-info-display">
        <p>Contact: <?php echo htmlspecialchars($shipping_info['email']); ?></p>
        <p>Ship to: <?php echo htmlspecialchars($shipping_info['first_name'] . ' ' . $shipping_info['last_name'] . ', ' . $shipping_info['address'] . ', ' . $shipping_info['city'] . ', ' . $shipping_info['postal_code'] . ', ' . $shipping_info['country']); ?></p>
    </div>
    <?php else: ?>
    <p>No shipping information available.</p>
    <?php endif; ?>
</body>
</html>