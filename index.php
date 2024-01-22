    <?php
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
        
        session_start();
        $userId = $_SESSION['user_id']; 
        $productId = $_POST['product_id'];
        
    
        $stmt = $conn->prepare("INSERT INTO UserFavorites (UserID, ProductID) VALUES (?, ?)");
        $stmt->bind_param("ii", $userId, $productId);

    
        if ($stmt->execute()) {
            echo "Product added to favorites successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }


        $stmt->close();
    } else {
    
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        }
        

        $conn->close();
        ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Typology</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qmcRX9P6Cl/e3L97QJ0FU3r+uhXo9DNO9OY3pRjL/R2fKQb6eg+SmCPn75aB8N3znn6J2d0o9VEA8+8vYuy6xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;700&display=swap">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    include 'top-footer.php';
    include 'navbar.php';

    ?>

            </body>
        </table>
    </div>





    </div>
    <div class="row">
    
        <div class="col-md-6 d-flex flex-column">
            <div class="header-left">
                <h1 class="title-left">Discover our teints</h1>
            </div>
            
            <div class="body-text">
                <p>Minimalist formulas. Maximum results.</p>
                <p>Our products contain no more than ten</p>
                <p>Natural ingredients, are fragrance-free</p>
                <p>and suitable for sensitive skin.</p>
            </div>

            <div class="button-container mt-auto">
    <a href="teintscollection.php" style="text-decoration: none;">
        <button class="explore-button">SHOP TEINTS COLLECTION</button>
    </a>
</div>
        </div>

        <div class="col-md-6 mt-1">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" style="max-height: 10%; margin-left: -250px;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://i.pinimg.com/564x/c7/06/97/c7069719d23114d3902d601e2caad802.jpg" class="d-block w-100" alt="Image 1" style="height: 100%; object-fit: cover;">
                    </div>
                    <div class="carousel-item">
                        <img src="https://i.pinimg.com/564x/f9/08/0b/f9080b6da77bd6de38282af8437f2143.jpg" class="d-block w-100" alt="Image 2" style="height: 100%; object-fit: cover;">
                    </div>
                </div>
            </div>

            <div style="position: absolute; top: 0; right: -360px; margin-top: -1px;">
                <img src="https://i.pinimg.com/564x/2c/89/71/2c89714756fe886bb8550d4e647c45f7.jpg" alt="Additional Image" style="max-width: 30%; height: auto;">
            </div>
            <div style="position: absolute; top: 0; right: -260px; margin-top: -1px;">
                <img src="assets/lightt2.png" alt="Additional Image2" style="max-width: 24%; height: auto;">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer mt-4">
        <div class="container">
            <div class="marquee-text">VEGAN. CRUELTY FREE. MADE IN FRANCE.</div>
            <div class="marquee-text">VEGAN. CRUELTY FREE. MADE IN FRANCE.</div>
            <div class="marquee-text">VEGAN. CRUELTY FREE. MADE IN FRANCE.</div>
        </div>
    </footer>

    <div class="bestsellers-header text-center">Bestsellers</div>
    <div class="background-box">
        <div class="shop-all-bestsellers">
            <p class="underline-text">SHOP ALL BESTSELLERS</p>
        </div>
    

        <style>
    
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; 
        }


        .product-container {
            text-align: center;
        }


        .product-container img {
            width: 150px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }


    .flex-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
    }

    .favorite-button {
        background-color: transparent;
        border: none;
        font-size: 24px;
        cursor: pointer;
        position: absolute;
        top: 0;
        right: 0;
    }


        .product-name {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-price {
            color: black;
        }

    
        .add-to-cart-button {
        background-color: black; 
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s; 
    }

    .add-to-cart-button:hover {
        background-color: grey; 
    }

    .product-name {
        font-family: 'Maven Pro', sans-serif;
    }

    .product-price {
        font-family: 'Roboto Mono', monospace;
    }

    </style>
    <main>
    <?php
    
$productCount = 0;

while ($row = $result->fetch_assoc()) {
    if ($productCount >= 4) {
        break;
    }

    $imageUrl = $row['product_image_url'];

    echo '<div class="product-container flex-container">';
    echo '<img src="' . $imageUrl . '" alt="' . $row['product_name'] . '">';

    echo '<form method="POST" action="addToFavorites.php">';
    echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '">';

    echo '<button type="submit" class="favorite-button">&#10084;</button>';

    echo '<div class="product-name">' . $row['product_name'] . '</div>';
    echo '<div class="product-price">$' . $row['product_price'] . '</div>';
    echo '<button type="button" class="view-details-button" onclick="window.location.href = \'product_details.php?id=' . $row['product_id'] . '\';">View Details</button>';

    echo '</form>';

    echo '</div>';

    $productCount++;
}
?>


    </main>

    </div>

    <div class="big-image-section mt-5 border border-1 p-1 text-center" style="max-width: 1200px; margin: auto;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <img src="https://i.pinimg.com/564x/16/2a/26/162a26f903e6b31f9dfbbebc8fa26c23.jpg" alt="Big Image" style="width: 100%; height: auto;">
            </div>
            
    
            <div class="col-md-4 text-end">
                <div class="big-image-header mb-3" style="font-family: 'Maven Pro', sans-serif;">
                    <h2>Special Collection</h2>
                </div>
                
                <div class="big-image-body-text" style="font-family: 'Roboto Mono', monospace;">
                    <p class="mb-">Our philosophy is not to add anything to our products to make them stand out; instead we pare them back and distil each formula down to the most-essential, natural active ingredients. Our formulas are simple, considered and effective. Provenance is important to us, so you'll always know where our ingredients come from. And we'll show you how to create your own skincare formulations along the way.</p>
                    
                    <a href="about.php" style="text-decoration: underline; font-family: 'Maven Pro', sans-serif; font-size: 13px; font-weight: Regular;">
    Discover Our Story
</a>


                </div>
            </div>
        </div>
    </div>




    <!--
<div class="big-video-section mt-5 position-relative" style="max-width: 1200px; margin: auto;">
    <div class="row justify-content-center align-items-center">
    
        <div class="col-md-8 position-relative">
        
            <video autoplay muted width="800" height="450" style="max-width: 100%; height: auto; margin-bottom: -20px;">
                <source src="assets/Untitled.mov" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            
            <div class="overlay-text text-center position-absolute top-50 start-50 translate-middle" style="color: rgb(1, 0, 0);">
                <div class="big-image-header mb-3" style="font-family: 'Maven Pro', sans-serif;">
                    <h2>Understand your skin and its complex needs.</h2>
                </div>
                
                <button class="big-image-body-text btn btn-dark text-center" style="font-family: 'Roboto Mono', monospace; border-radius: 0px;">
                    <p class="mb- text-white">BEGIN DIAGNOSTIC TEST</p>
                </button>
            </div>
        </div>
    </div>
</div>
-->


    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="java.js"></script>

    <script>

document.querySelectorAll('.favorite-button').forEach(item => {
    item.addEventListener('click', event => {
        let productId = event.target.getAttribute('data-productid');
        addToFavorites(productId);
    })
});

// Function to handle adding to favorites
function addToFavorites(productId) {
    let formData = new FormData();
    formData.append('product_id', productId);

    fetch('addToFavorites.php', { 
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data); 
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
</script>
    </body>
    </html>
