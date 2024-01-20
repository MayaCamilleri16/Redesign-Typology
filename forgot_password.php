<?php
session_start();
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['token'])) {
    $token = $_GET['token'];

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password'])) {
    header("Location: login.php");
    exit(); 

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Reset Password</title>
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
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
