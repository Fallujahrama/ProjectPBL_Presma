<?php
session_start();
include('conDb.php');

$message = "";
$debug = ""; // Add debug variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    
    $debug .= "Form submitted with username: " . htmlspecialchars($username) . "<br>";
    
    if (!empty($username) && !empty($password)) {
        $query = "SELECT * FROM akun WHERE username = ?";
        $stmt = $conn->prepare($query);
        
        if (!$stmt) {
            $debug .= "Prepare failed: " . $conn->error . "<br>";
        } else {
            $stmt->bind_param("s", $username);
            
            if (!$stmt->execute()) {
                $debug .= "Execute failed: " . $stmt->error . "<br>";
            } else {
                $result = $stmt->get_result();
                $debug .= "Query executed. Found rows: " . $result->num_rows . "<br>";
                
                if ($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    $debug .= "User found. Verifying password...<br>";
                    
                    // Debug password verification
                    $debug .= "Stored hash: " . $row['password'] . "<br>";
                    
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['username'] = $row['username'];
                        $debug .= "Password verified successfully!<br>";
                        header("Location: welcome.php");
                        exit();
                    } else {
                        $message = "Incorrect password!";
                        $debug .= "Password verification failed<br>";
                    }
                } else {
                    $message = "Username not found!";
                }
            }
            $stmt->close();
        }
    } else {
        $message = "Please enter username and password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        .error { color: red; }
        .debug { background-color: #f0f0f0; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>
    <form method="POST" action="">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        <?php if (!empty($message)): ?>
            <div class="error"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
    </form>
    
    <?php if (!empty($debug)): ?>
        <div class="debug">
            <strong>Debug Information:</strong><br>
            <?php echo $debug; ?>
        </div>
    <?php endif; ?>
</body>
</html>