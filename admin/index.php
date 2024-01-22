<?php

$host = "localhost";
$username = "Maya";
$password = "xqeXXyp*-RePcD(R";
$database = "Maya";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$status = "Open"; 

$sql = "SELECT ID, User, Subject, Status, DateSubmitted FROM SupportRequests WHERE Status = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $status);
$stmt->execute();
$result = $stmt->get_result();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   
    <link rel="stylesheet" href="style.css"> <!-- Link to your custom admin styles if available -->
</head>
<body>
    <header>
        <h1>Welcome, Administrator!</h1>
        <nav>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="submit_reply.php">Support Requests</a></li>
                <li><a href="view_request.php">Manage Users</a></li>
                
            </ul>
        </nav>
    </header>
    
    <section id="support-requests">
        <h2>Support Requests</h2>
        
       
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Date Submitted</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['User']; ?></td>
                        <td><?php echo $row['Subject']; ?></td>
                        <td><?php echo $row['Status']; ?></td>
                        <td><?php echo $row['DateSubmitted']; ?></td>
                        <td><a href="view_request.php?id=<?php echo $row['ID']; ?>">View Details</a></td>
                    </tr>
                <?php endwhile; ?>
                
            </tbody>
        </table>
    </section>
    
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Your Company Name</p>
    </footer>
</body>
</html>

<?php

$stmt->close();
$conn->close();
?>
