<?php
session_start();
include('conDb.php');
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM akun WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];  // Store role in session
            
            // Redirect based on role
            if ($row['role'] === 'supadmin') {
                header("Location: dashboard_supadmin.php");
            } else if ($row['role'] === 'admin') {
                header("Location: dashboard_admin.php");
            } else if ($row['role'] === 'mahasiswa') {
                header("Location: dashboard_mahasiswa.php");
            } else {
                $message = "Invalid role assignment!";
            }
            exit();
        } else {
            $message = "Invalid username or password!";
        }
        $stmt->close();
    } else {
        $message = "Please enter username and password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coba Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .error { color: red; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="logs">
        <h2>LOGIN</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Login</button>
            <?php if (!empty($message)): ?>
                <div class="error"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>