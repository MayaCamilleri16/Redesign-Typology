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



if (isset($_GET['id'])) {
    $productId = $_GET['id'];


    $query = "SELECT * FROM Byedit WHERE id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

   
        $productName = $product['name'];
        $imageUrl = $product['image_url'];
        $description = $product['description'];
        $price = $product['price'];
    } else {
  
        $productName = "Product not found";
        $description = "The product you are looking for does not exist.";
        $price = 0; 
    }
} else {

    $productName = "Product not found";
    $description = "Please provide a valid product ID.";
    $price = 0; 
}

mysqli_close($conn);
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
        .btn-outline-dark {
            border-color: #000000; 
            color: #000000; 
        }
        .btn-outline-dark:hover {
            background-color: #000000; 
            color: #ffffff; 
        }
    </style>
</head>
<?php
    include 'top-footer.php';
    include 'navbar.php';

    ?>
    

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $imageUrl; ?>" alt="<?php echo $productName; ?>">
            <br>
            <br>
            <br>
    
        </div>
        <div class="col-md-6">
            <h2><?php echo $productName; ?></h2>
            
            <!--  star ratings -->
        
            <div class="star-ratings">
                <?php
                $averageRating = 4.5; 
                $maxRating = 5; 
                $percentage = ($averageRating / $maxRating) * 100;
                ?>
                <div class="star-ratings-top" style="width: <?php echo $percentage; ?>%;">
                    ★★★★★
                </div>
                
                <!-- Link to reviews -->
            <p><a href="#reviews">Read our customer reviews</a></p>
            <h3>Description</h3>
            <p><?php echo $description; ?></p>
            <p>Price: € <?php echo $price; ?></p>


<!--Cart button -->
<button onclick="addToCart(<?php echo $productId; ?>)" class="btn btn-outline-dark">Add to Cart</button>


<script>
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
           .
            toggleSideCart();
        } else {
            alert('Error adding product to cart.');
        }
    };
    xhr.send('product_id=' + productId);
}
</script>

        </div>
    </div>

    <div id="reviews" class="row">
    <div class="col-12">
        <h3>Customer Reviews</h3>
        <?php
    
        $mysqli = new mysqli("localhost", "Maya", "xqeXXyp*-RePcD(R", "Maya");

       
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

      
        $result = $mysqli->query("SELECT reviewer_name, rating, comment FROM reviews");

         
          if ($result && $result->num_rows > 0) {
          
            while ($review = $result->fetch_assoc()) {
                echo '<div class="customer-review">';
                echo '<p><strong>' . htmlspecialchars($review['reviewer_name']) . '</strong></p>';
               
                echo '<div class="star-rating">';
                for ($i = 0; $i < 5; $i++) {
                    if ($i < $review['rating']) {
                        echo '★'; 
                    } else {
                        echo '☆'; 
                    }
                }
                echo '</div>';
                echo '<p>' . htmlspecialchars($review['comment']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No reviews yet.</p>';
        }
        $mysqli->close();
        ?>
    </div>
</div>

    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="java.js"></script>
    </body>
    </html>


