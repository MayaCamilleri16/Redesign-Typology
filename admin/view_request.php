<?php
// Check if the user is logged in and is an administrator
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php"); // Redirect to the login page if not logged in as an admin
    exit();
}
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
if (isset($_GET['id'])) {
    $supportRequestId = $_GET['id'];
    
    // Query the database to retrieve the details of the selected support request
    $sql = "SELECT * FROM SupportRequests WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $supportRequestId);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Now you have the details of the support request in the $row variable
        } else {
            // Support request not found
            echo "Support request not found.";
        }
    } else {
        echo "Error during query execution: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Support request ID not provided in the URL
    echo "Support request ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Request Details</title>
  
</head>
<body>
    <h1>Support Request Details</h1>

   
    <?php
   
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        //  message
        echo '<p class="success-message">Admin reply submitted successfully!</p>';
    }
    ?>

    
    <?php if (isset($row)): ?>
        <p><strong>ID:</strong> <?php echo $row['ID']; ?></p>
        <p><strong>User:</strong> <?php echo $row['User']; ?></p>
        <p><strong>Subject:</strong> <?php echo $row['Subject']; ?></p>
        <p><strong>Status:</strong> <?php echo $row['Status']; ?></p>
        <p><strong>Date Submitted:</strong> <?php echo $row['DateSubmitted']; ?></p>
       
    <?php endif; ?>

 
    <h2>Admin Replies</h2>
    <?php
   
    $sql = "SELECT AdminReply, Timestamp FROM SupportRequestReplies WHERE SupportRequestID = ?";
    $stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error during query preparation: " . $conn->error);
}


    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $adminReply = $row['AdminReply'];
                $timestamp = $row['Timestamp'];
               
                echo "<div class='admin-reply'>";
                echo "<p><strong>Admin Reply:</strong> $adminReply</p>";
                if (!empty($timestamp)) {
                    echo "<p><strong>Timestamp:</strong> $timestamp</p>";
                }
                echo "</div>";
            }
        } else {
            echo "No admin replies yet.";
        }
    } else {
        echo "Error during query execution: " . $stmt->error;
    }
    $stmt->close();
    ?>

    <section>
        <h2>Reply to Support Request</h2>
        <form action="submit_reply.php" method="post">
            <input type="hidden" name="support_request_id" value="<?php echo $supportRequestId; ?>">
            <label for="admin_reply">Admin Reply:</label>
            <textarea id="admin_reply" name="admin_reply" rows="4" required></textarea>
            <button type="submit">Submit Reply</button>
        </form>
    </section>
</body>
</html>
