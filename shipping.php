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

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id']; 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $apartment = $_POST['apartment'] ?? '';
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    

    $stmt = $conn->prepare("SELECT * FROM Shipping WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
   
        $stmt = $conn->prepare("UPDATE Shipping SET first_name = ?, last_name = ?, address = ?, city = ?, postal_code = ?, country = ?, phone = ? WHERE user_id = ?");
        $stmt->bind_param("sssssssi", $first_name, $last_name, $address, $city, $postal_code, $country, $phone, $user_id);
    } else {
      
        $stmt = $conn->prepare("INSERT INTO Shipping (user_id, first_name, last_name, address, city, postal_code, country, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssss", $user_id, $first_name, $last_name, $address, $city, $postal_code, $country, $phone);
    }
    $stmt->execute();
    $stmt->close();
    
   
    header("Location: shipping.php");
    exit;
}
$user_id = $_SESSION['user_id'] ?? null; 
$shipping_info = null;

if ($user_id) {
    $stmt = $conn->prepare("SELECT * FROM Shipping WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $shipping_info = $result->fetch_assoc();
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qmcRX9P6Cl/e3L97QJ0FU3r+uhXo9DNO9OY3pRjL/R2fKQb6eg+SmCPn75aB8N3znn6J2d0o9VEA8+8vYuy6xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
        
        .container {
            max-width: 600px;
            margin: auto;
        }
        .contact-info, .shipping-address {
            background-color: #ffeef8;
            border: 1px solid black;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .shipping-method {
            background-color: #ffeef8;
            border: 1px solid black;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .action-buttons {
            text-align: right;
        }
        .action-buttons .btn {
            margin: 5px;
        }
        h2 {
            border-bottom: 1px solid black;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Typology.</h1>

       <!-- Contact Info -->
<div class="contact-info">
    <h2>Contact</h2>
   
    <p><?php echo $shipping_info ? htmlspecialchars($shipping_info['email']) : 'Not available'; ?></p>
</div>
        <!-- Shipping Address -->
<div class="shipping-address">
    <h2>Ship to</h2>
   
    <p>
        <?php 
        if ($shipping_info) {
            echo htmlspecialchars($shipping_info['address']) . ", " . htmlspecialchars($shipping_info['city']) . ", " . htmlspecialchars($shipping_info['postal_code']) . ", " . htmlspecialchars($shipping_info['country']);
        } else {
            echo 'Not available';
        }
        ?>
    </p>
</div>
        
        <form action="payment.php" method="post"> 
            <div class="shipping-method">
                <h2>Shipping Method</h2>
                <label>
                    <input type="radio" name="shipping_method" value="standard" checked> 
                    Standard Shipping - 5 to 7 business days
                </label>
            </div>

      
<div class="action-buttons">
    <a href="checkout.php" class="btn btn-secondary">Return to information</a>
    <a href="payment.php" class="btn btn-primary">Continue To Payment</a>
</div>

        </form>
    </div>
</body>
</html>
