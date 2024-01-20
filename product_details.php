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

$productFound = false;

if (isset($_GET['id']) && isset($_GET['source'])) {
    $productId = $_GET['id'];
    $source = $_GET['source'];


    $table = ($source === 'facecare') ? 'FaceCare' : 'ByEdit';

    // Prepare the SQL statement to fetch product details from the correct table
    if ($stmt = $conn->prepare("SELECT * FROM {$table} WHERE id = ?")) {
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $productName = $product['name'];
            $imageUrl = $product['image_url'];
            $description = $product['description'];
            $price = $product['price'];
        } else {
            $productName = "Product not found";
            $description = "The product you are looking for does not exist.";
            $price = "0";
            $imageUrl = "path/to/default-image.jpg"; // Path to your default image
        }
        $stmt->close();
    }
}

$conn->close();
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

$result = $mysqli->query("SELECT id, reviewer_name, rating, comment FROM reviews");

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


        echo '<form method="post" action="add_comment.php">';
        echo '<input type="hidden" name="review_id" value="' . $review['id'] . '">';
        echo '<div class="form-group">';
        echo '<label for="commenter_name">Your Name:</label>';
        echo '<input type="text" class="form-control" id="commenter_name" name="commenter_name" required>';
        echo '</div>';
        echo '<div class="form-group">';
        echo '<label for="comment_text">Comment:</label>';
        echo '<textarea class="form-control" id="comment_text" name="comment_text" rows="3" required></textarea>';
        echo '</div>';
        echo '<button type="submit" class="btn btn-primary">Submit Comment</button>';
        echo '</form>';

        echo '</div>';
    }
} else {
    echo '<p>No reviews yet.</p>';
}
$mysqli->close();
?>

   <!-- add a review -->
<h3>Add Your Review</h3>
<form method="post" action="add_review.php">
    <div class="form-group">
        <label for="reviewer_name">Your Name:</label>
        <input type="text" class="form-control" id="reviewer_name" name="reviewer_name" required>
    </div>
    <div class="form-group">
        <label for="rating">Rating:</label>
        <select class="form-control" id="rating" name="rating" required>
            <option value="1">★☆☆☆☆</option>
            <option value="2">★★☆☆☆</option>
            <option value="3">★★★☆☆</option>
            <option value="4">★★★★☆</option>
            <option value="5">★★★★★</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment">Review:</label>
        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
    </div>
    <!-- Add the hidden input field for 'product_id' here -->
    <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
    <button type="submit" class="btn btn-primary">Submit Review</button>
</form>

<!-- add comment -->
<h4>Add Your Comment</h4>
<form method="post" action="add_comment.php">
    <input type="hidden" name="review_id" value="<?php echo $reviewId; ?>">
    <div class="form-group">
        <label for="commenter_name">Your Name:</label>
        <input type="text" class="form-control" id="commenter_name" name="commenter_name" required>
    </div>
    <div class="form-group">
        <label for="comment_text">Comment:</label>
        <textarea class="form-control" id="comment_text" name="comment_text" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit Comment</button>
</form>



    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="java.js"></script>
    <script>

<script>
function addToCart(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Product added to cart successfully
            alert('Product added to cart.');
        } else {
            alert('Error adding product to cart.');
        }
    };
    xhr.send('product_id=' + productId);
}
</script>

</script>

    </body>
    </html>


