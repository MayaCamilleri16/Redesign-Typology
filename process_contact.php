<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

   
    $to = "support@example.com"; 
    $subject = "Contact Us: " . $subject;
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);
    header("Location: thank_you.html");
    exit();
}
?>
