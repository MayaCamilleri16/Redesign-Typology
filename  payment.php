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
    <title>Shipping</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qmcRX9P6Cl/e3L97QJ0FU3r+uhXo9DNO9OY3pRjL/R2fKQb6eg+SmCPn75aB8N3znn6J2d0o9VEA8+8vYuy6xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
</style>

<form method="post" action="payment.php">
    <h2>Payment Method</h2>
    
    <!-- Apple Pay Button -->
    <button id="apple-pay-button">
        Pay with Apple Pay
    </button>

    <!-- Card Payment Fields -->
    <div id="card-payment">
        <label for="card-number">Card Number</label>
        <input type="text" id="card-number" name="card_number" required>

        <label for="expiry-date">Expiry Date</label>
        <input type="text" id="expiry-date" name="expiry_date" required>

        <label for="cvc">CVC</label>
        <input type="text" id="cvc" name="cvc" required>
    </div>

    <input type="submit" name="submit_payment" value="Pay Now">
</form>

<script>

document.getElementById('apple-pay-button').addEventListener('click', function(e) {
    e.preventDefault();

});
</script>
</body>
</html>