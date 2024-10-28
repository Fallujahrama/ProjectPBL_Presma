<?php
session_start();

// Check if user is logged in and has supadmin role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'supadmin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard">
        <h1>Welcome Super Admin Dashboard</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        
        <!-- Add super admin-specific content here -->
        <div class="dashboard-content">
            <h2>Super Admin Controls</h2>
            <!-- Add your super admin-specific features here -->
        </div>
        
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</body>
</html>