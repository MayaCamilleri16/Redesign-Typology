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

$sql = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

$confirmationMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['subject']) &&
        isset($_POST['message'])
    ) {
      
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

       // Insert data into the database
       $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message, admin_reply) VALUES (?, ?, ?, ?, ?)");
       $stmt->bind_param("sssss", $name, $email, $subject, $message, $adminReply);
       $adminReply = ''; // Set an empty string for admin_reply
       $stmt->execute();

   } else {
       $confirmationMessage = "Form fields are not set correctly.";
   }
}
        $stmt->close();
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-qmcRX9P6Cl/e3L97QJ0FU3r+uhXo9DNO9OY3pRjL/R2fKQb6eg+SmCPn75aB8N3znn6J2d0o9VEA8+8vYuy6xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include 'top-footer.php';
    include 'navbar.php';
    ?>

    <header>
        <h1>Contact Us</h1>
    </header>
    <main>
        <section>
            <h2>Contact Information</h2>
            <p>Email: support@yourshoppingwebsite.com</p>
            <p>Phone: +123-456-7890</p>
            <p>Address: 123 Shopping St, City, Country</p>
        </section>
        <section>
            <h2>Contact Form</h2>
            <form action="contact.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <button type="submit">Submit</button>
            </form>
            <div><?php echo $confirmationMessage; ?></div> 
        </section>
    </main>

    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="java.js"></script>

</body>

</html>
