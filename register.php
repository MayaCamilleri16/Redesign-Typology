<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['terms'])) { 
    $fullname = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; 
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

   
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        if (!$email) {
            $error_message = "Invalid email address.";
        } else {
         
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
            $host = "localhost";
            $db_username = "Maya";
            $db_password = "xqeXXyp*-RePcD(R";
            $database = "Maya";

            $conn = new mysqli($host, $db_username, $db_password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

      
            $check_sql = "SELECT username FROM user1 WHERE username = ?";
            $check_stmt = $conn->prepare($check_sql);
            $check_stmt->bind_param("s", $username);
            $check_stmt->execute();
            $check_result = $check_stmt->get_result();

            if ($check_result->num_rows > 0) {
                $error_message = "Username already exists. Please choose a different username.";
            } else {
                
                $stmt = $conn->prepare("INSERT INTO user1 (username, password) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $hashed_password);

                if ($stmt->execute()) {
                   
                    $_SESSION['username'] = $username;
                  
                    header("Location: login.php?username=" . urlencode($username));
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            }
            $check_stmt->close();
            $conn->close();
        }
    }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            font-family: 'maven pro';
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .register-container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type=text], input[type=password], input[type=email] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type=checkbox] {
            margin-bottom: 15px;
        }

        input[type=submit] {
            padding: 10px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type=submit]:hover {
            background-color: #3f51b5;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="register-container">
    <h2>Register</h2>
        <?php if (!empty($error_message)): ?>
            <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required><br>
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email Address" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
            <input type="checkbox" name="terms" id="terms" required><br>
            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">log in</a></p> 
    </div>
</div>

</body>
</html>

