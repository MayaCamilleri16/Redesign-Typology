<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "Maya";
$password = "xqeXXyp*-RePcD(R";
$database = "Maya";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
function calculateTotal($cart, $mysqli) {
    $total = 0;
    foreach ($cart as $id => $quantity) { // Note that $cart is now an associative array
        $query = "SELECT price FROM Byedit WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($product = $result->fetch_assoc()) {
                $total += $product['price'] * $quantity; // Multiply by quantity
            }
        }
        $stmt->close();
    }
    return $total;
}



if (isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    if (($key = array_search($remove_id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }


    header("Location: cart.php");
    exit;
}

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Add product to cart
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
    
   
    header("Location: cart.php");
    exit;
}
//quantity
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Validate and sanitize inputs
    $product_id = filter_var($product_id, FILTER_SANITIZE_NUMBER_INT);
    $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);

    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 0;
    }
    $_SESSION['cart'][$product_id] += $quantity; // Add or update the quantity of the product

    header("Location: cart.php");
    exit;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qmcRX9P6Cl/e3L97QJ0FU3r+uhXo9DNO9OY3pRjL/R2fKQb6eg+SmCPn75aB8N3znn6J2d0o9VEA8+8vYuy6xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="cart-container">
        <div class='cart-title' style='text-align: center; padding: 10px; font-size: 24px; font-weight: bold; border-bottom: 1px solid #ccc; margin-bottom: 20px; font-family: "Maven Pro", sans-serif;'>Your bag<span class='close-cart' onclick='closeCart()' style='float: right; cursor: pointer;'>&times;</span></div>

<?php
foreach ($_SESSION['cart'] as $id) {
    $query = "SELECT * FROM Byedit WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            echo "<div class='cart-item'>";
            echo "<img src='" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "' style='width: 50px;'>";
            echo "<div class='cart-item-detail'>";
            echo "<p>" . htmlspecialchars($product['name']) . "</p>";
            echo "<p>€" . htmlspecialchars($product['price']) . "</p>";
            echo "</div>";

            echo "<form method='post'>";
            echo "<input type='hidden' name='remove_id' value='$id'>";
            echo "<button type='submit' class='remove-item' style='float: right;'><i class='fas fa-trash-alt'></i></button>";
            echo "</form>";
            
            echo "</div>";
        }
    }
    $stmt->close();
}
?>


        <?php
        $total_price = calculateTotal($_SESSION['cart'], $mysqli);
        echo "<div class='cart-total'>Total: €" . $total_price . "</div>";
        ?>

<form action="checkout.php" method="post">
    <?php foreach ($_SESSION['cart'] as $id): ?>
        <input type="hidden" name="product_ids[]" value="<?php echo $id; ?>">
    <?php endforeach; ?>
    <button type="submit">Checkout</button>
</form>

    <style>
    
    </style>

    <script>
        function closeCart() {
            window.location.href = 'product_details.php';
        }
    </script>
</body>
</html>
