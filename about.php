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
   
    <?php
include 'top-footer.php';
include 'navbar.php';

?>
    </body>
<head>
    
   

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="container">
                <div class="row">
                   
                    <div class="col-md-6 mb-3">
                        <img src="https://i.pinimg.com/564x/67/16/64/67166433f044aa26a31eec9188666f96.jpg" class="d-block w-100" alt="Image 1" width="350" height="350">
                    </div>
                  
                    <div class="col-md-6">
                        <h2>I wanted to create a radical new skincare brand...</h2>
                        <p>
                            We wanted to take an autonomous approach. Working from the ground up, we built an online-only, direct to customer model, which means we can sell premium products with the highest quality ingredients at a great price.
                            Staying true to our philosophy of simplicity and transparency, we intend to remain uncompromising in our mission to offer consumers a premium natural skincare alternative.
                            Ning Li, Typology Founder
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="carousel-item">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <img src="https://i.pinimg.com/564x/7e/3f/99/7e3f99f7dcb31b7fb760b574ea48b837.jpg" class="d-block w-100" alt="Image 2" width="300" height="400">
                    </div>
                    
                    <div class="col-md-6">
                        <h2>Our philosophy is not to add anything to our products to make them stand out...</h2>
                        <p>
                            We're tireless in our mission to hunt down the best ingredients.
                            Whether in France, around Europe or further afield in search of exotic extracts, they must be sourced from sustainable farms using gentle extraction techniques.
                            Our formulas are simple, considered and effective. Provenance is important to us, so you'll always know where our ingredients come from. And we'll even show you how to create your own skincare formulations along the way.
                            All formulations are 100% French. Our partner laboratories in Bergerac, Aix en Provence and Compiègne work with us to put their French skincare heritage to good use.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="carousel-item">
            <div class="container">
                <div class="row">
                    <!-- Images Side -->
                    <div class="col-md-6 mb-3">
                        <img src="https://i.pinimg.com/564x/85/c9/ec/85c9ec50cf702aaa9f1b012c477f6509.jpg" class="d-block w-100" alt="Image 3" width="500" height="300">
                    </div>
                    
                    <div class="col-md-6">
                        <h2>Since it began, our company has strived to become more respectful of the environment...</h2>
                        <p>
                            Founded in 2006, the B Corp movement brings together companies with a common objective: to balance purpose and profit by integrating social and environmental commitments into their economic models. The idea is not to become the best in the world, but to try to be better for the world. B Corp certification allows us to act on our need to have a positive impact within our industry and society through its implementation of concrete guidance and assessments.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>





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



