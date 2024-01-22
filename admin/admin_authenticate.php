<?php
session_start();


$host = "localhost";
$dbUser = "Maya"; 
$dbPassword = "xqeXXyp*-RePcD(R";
$database = "Maya";

$conn = new mysqli($host, $dbUser, $dbPassword, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $formUsername = $_POST['username']; 
    $formPassword = $_POST['password'];

   
    $stmt = $conn->prepare("SELECT admin_id, password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $formUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        


        
        if (password_verify($formPassword, $hashed_password)) {

            // Password is correct
            $_SESSION['admin_id'] = $row['admin_id'];
            header("Location: index.php");
            exit;
        } else {
          
            echo "Invalid password.";
        }
    } else {

        echo "Invalid username.";
    }


    $stmt->close();
}


$conn->close();
?>
