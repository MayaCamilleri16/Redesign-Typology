<?php
$host = "localhost";
$dbUser = "Maya"; 
$dbPassword = "xqeXXyp*-RePcD(R"; 
$database = "Maya";

$conn = new mysqli($host, $dbUser, $dbPassword, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//admin username and passwrod
$newAdminUsername = 'maya'; 
$newAdminPassword = 'maya123!';


$hashedPassword = password_hash($newAdminPassword, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $newAdminUsername, $hashedPassword);
$stmt->execute();

if ($stmt->affected_rows === 1) {
    echo "New admin user created successfully.";
} else {
    echo "Error creating admin user: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
