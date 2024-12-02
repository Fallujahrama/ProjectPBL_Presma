<?php
session_start();
include('db_connect.php');
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($_POST);
        $username = trim($_POST["username"]);
        $password = trim($_POST["password"]);
    
        if (!empty($username) && !empty($password)) {
            // Query untuk memeriksa keberadaan username dan password di database
            $query = "SELECT * FROM userid WHERE username = ? AND password = ?";
            $params = array($username, $password);
            $stmt = sqlsrv_query($conn, $query, $params); // Menggunakan sqlsrv_query
    
            if ($stmt) {
                if (sqlsrv_has_rows($stmt)) {
                    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
    
                    // Redirect berdasarkan role
                    if ($row['role'] === 'Super Admin') {
                        header("Location: dashSupAdm.php");
                    } else if ($row['role'] === 'Admin') {
                        header("Location: dashAdm.php");
                    } else if ($row['role'] === 'Mahasiswa') {
                        header("Location: dashMhs.php");
                    } else {
                        $message = "Invalid role assignment!";
                    }
                    exit();
                } else {
                    $message = "Invalid username or password!";
                }
            } else {
                $message = "Error executing query!";
            }
        } else {
            $message = "Please enter username and password!";
        }
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