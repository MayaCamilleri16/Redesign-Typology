<?php
session_start();
$error_message = '';


$host = "localhost";
$db_username = "Maya";
$db_password = "xqeXXyp*-RePcD(R";
$database = "Maya"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli($host, $db_username, $db_password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $form_password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, password FROM user1 WHERE username = ?");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($form_password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Username does not exist.";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: 'maven pro';
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
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
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type=text], input[type=password] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
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

        a {
            text-align: center;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>

    <?php if ($error_message): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
    <a href="forgot_password.php">Forgot Password?</a>

</body>
</html>
