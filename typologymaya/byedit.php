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

$query = "SELECT * FROM Byedit";
$result = mysqli_query($conn, $query);

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
</head>
<?php
    include 'top-footer.php';
    include 'navbar.php';

    ?>

<body>

<head>


    <style>
    a, a:hover, a:visited, a:active {
        color: black;     
        text-decoration: none;
    }

  
    a:hover {
        text-decoration: underline; 
    }
    </style>
</head>

        
 

<div class="center-header">
        <h2>BY EDIT</h2>
    </div>

    <div class="header-left header-left-left">
        <button class="dropdown-btn" onclick="toggleDropdown()">New Arrivals<span class="dropdown-arrow"></span></button>
        <div id="dropdownBox" class="dropdown-box">
            <a href="#">Last Chance</a>
            <a href="#">Accessories</a>
        </div>
    </div>
    
    <div class="container">
    <div class="row">
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productId = $row['id']; // Get the product ID

                // Extract product details
                $productName = $row['name'];
                $imageUrl = $row['image_url'];
                $description = $row['description'];
                $price = $row['price'];

                echo '
                <div class="col-md-2 col-sm-4 image-item">
                    <a href="product_details.php?id=' . $productId . '">
                        <img src="' . $imageUrl . '" alt="' . $productName . '">
                        <p>' . $productName . ' - £' . $price . '</p>
                    </a>
                </div>';
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
    </div>
</div>



    
    <?php
    include 'footer.php';
    mysqli_close($conn);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="java.js"></script>
    </body>
    </html>


