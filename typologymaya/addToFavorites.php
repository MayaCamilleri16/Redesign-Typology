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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $productId = $_POST['product_id'];

        $stmt = $conn->prepare("INSERT INTO UserFavorites (UserID, ProductID) VALUES (?, ?)");

        if ($stmt) {
            $stmt->bind_param("ii", $userId, $productId);

            if ($stmt->execute()) {
                echo "Product added to favorites successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "User is not logged in.";
    }
} else {
    echo "Invalid request.";
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
</head>
<?php
    include 'top-footer.php';
    include 'navbar.php';

    ?>

            </body>
        </table>
    </div>

<style>
    body {
        margin: 0;
        padding: 0;
        background: url('https://iso.500px.com/wp-content/uploads/2021/06/Natural-SPA-concept-By-Natalia-Klenova-2.jpg') center top no-repeat;
        background-size: 100% 140%;
        height: 50vh;
        position: relative;
    }

    .header-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 41%;
    padding: 300px;
    box-sizing: border-box;
    text-align: right;
    color: rgb(53, 4, 4);
    font-size: 600px !important; 
}



    .my-favourites-header {
    position: absolute;
    top: 170%; 
    left: 10%;
    transform: translateY(-50%);
    color: #000000;
    font-size: 2em;
}

.favorite-items-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-top: 600px;
    margin-bottom: 100px;
}

.favourite-item {
    max-width: 200px;
    overflow: hidden;
    flex: 1;
    text-align: center;
    margin: 60px;
}

.favourite-item img {
    width: 100%;
    height: auto;
    display: block;
    margin-bottom: 10px;
}



.favourite-item-text {
    font-family: 'Roboto Mono', monospace;
    font-size: 11px;
    color: #040202;
    text-align: center;
    margin-top: 5px; 
}

    .welcome-header h1 {
    font-size: 90px;
    font-weight: bold; 
}


</style>

<body>

    <div class="header-container welcome-header">
        <h1>WELCOME MAYA</h1>
    </div>

    <div class="my-favourites-header">
        <h2>My Favourites</h2>
    </div>

 
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>

    <?php
    include 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="java.js"></script>
    </body>
    </html>

