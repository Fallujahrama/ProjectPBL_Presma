<?php
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <h1>Welcome Admin Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        
        <!-- Add admin-specific content here -->
        <div class="dashboard-content">
            <h2>Admin Controls</h2>
            <!-- Add your admin-specific features here -->
        </div>
        
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>