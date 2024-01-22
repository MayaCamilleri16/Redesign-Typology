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
    <body style="background: url('https://iso.500px.com/wp-content/uploads/2021/06/Natural-SPA-concept-By-Natalia-Klenova-2.jpg') center top no-repeat; background-size: 100% 140%;">
    <?php
include 'top-footer.php';
include 'navbar.php';

?>
    </body>

<br>
<div class="header-container">
    <?php
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
        echo '<h1>Welcome, ' . htmlspecialchars($username) . '!</h1>';
    } else {
        echo '<h1>Welcome</h1>';
    }
    ?>
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



        <div class="row">
            <div class="col-md-6">
                <div class="account-section">
                    <h2>My Orders</h2>
                    <div class="account-content">
                       
                        <p>Order 1 details</p>
                    </div>
                    <button class="btn btn-primary mt-2">View All</button>
                </div>
            </div>

            

        <div class="row">
        <div class="col-md-6">
    <div class="account-section">
        <h2>Sign Out</h2>
        <div class="account-content">
        </div>
        <!-- Sign Out -->
        <form action="login.php" method="POST">
           
            <input type="submit" class="btn btn-primary mt-2" value="Sign out">
        </form>
    </div>
    <button id="support_button">
        <a href="contact.php" style="text-decoration: none; color: inherit;">Support</a>
    </button>
</div>
            </div>
        </div>
    </div>


       
        <?php
include 'footer.php';
?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="java.js"></script>
</body>
</html>
