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

// Add product to cart
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (!in_array($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $product_id;
    }
    

    $cart_html = '';
    foreach ($_SESSION['cart'] as $id) {
        $query = "SELECT * FROM Byedit WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($product = $result->fetch_assoc()) {
                $cart_html .= "<div class='cart-item'>";
                $cart_html .= "<img src='" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "' style='width: 100px;'>";
                $cart_html .= "<p>" . htmlspecialchars($product['name']) . " - €" . htmlspecialchars($product['price']) . "</p>";
                $cart_html .= "</div>";
            }
        }
        $stmt->close();
    }

    echo $cart_html;
    $mysqli->close();
    exit;
} else {
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favourites</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qmcRX9P6Cl/e3L97QJ0FU3r+uhXo9DNO9OY3pRjL/R2fKQb6eg+SmCPn75aB8N3znn6J2d0o9VEA8+8vYuy6xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
        .side-cart {
            position: fixed;
            right: -100%;
            top: 0;
            width: 300px; 
            height: 100%;
            background: white;
            z-index: 1000;
            transition: right 0.3s;
            
        }

        .side-cart.visible {
            right: 0;
        }

       
    </style>
</head>
<body>




<!-- Side Cart -->
<div id="side-cart" class="side-cart">
    <?php
    if (!empty($_SESSION['cart'])) {
        echo "<div class='cart-products'>"; 
        foreach ($_SESSION['cart'] as $productId) {
            $query = "SELECT * FROM Byedit WHERE id = " . intval($productId);
            $result = $mysqli->query($query);

            if ($result && $result->num_rows > 0) {
                while ($product = $result->fetch_assoc()) {
                    echo "<div class='cart-item'>";
                    echo "<img src='" . htmlspecialchars($product['image_url']) . "' alt='" . htmlspecialchars($product['name']) . "' style='width: 100px;'>";
                    echo "<p>" . htmlspecialchars($product['name']) . " - €" . htmlspecialchars($product['price']) . "</p>";
                    echo "</div>";
                }
            }
        }
        echo "</div>"; 
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
</div>


 
 <script>
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                
                document.getElementById('side-cart').innerHTML = xhr.responseText;
                toggleSideCart(true); 
            } else {
                alert('Error adding product to cart.');
            }
        }
    };
    xhr.send('product_id=' + productId);
}

function fetchCart() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'cart.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                document.getElementById('side-cart').innerHTML = xhr.responseText;
                toggleSideCart(true); 
            }
        }
    };
    xhr.send();
}

function toggleSideCart(open) {
    var cart = document.getElementById('side-cart');
    if (open) {
        cart.classList.add('visible');
    } else {
        cart.classList.remove('visible');
    }
}



</script>



</body>
</html>

<?php
$mysqli->close();
?>