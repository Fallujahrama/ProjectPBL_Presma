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
    <title>GoPres Polinema</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background-image: url(asset/backgroundImage.jpg);
            background-size: cover;
            overflow: hidden;
        }
        .left-side {
            width: 50%;
            margin-left: 50px;
            padding-right: none;
            flex: 1;
            background-color: transparent;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .star-logo {
            width: 15em;
            margin-left: -80px;
        }
        .welcome-header {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .welcome-header h1 {
            font-size: 3rem;
            color: black;
        }
        .logs {
            max-width: 400px;
            margin-top: -100px;
            padding: 10px;
            background-color: transparent;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            right: 140px;
        }
        .container {
            display: flex;
            justify-content: flex-end;
            height: 100vh;
            align-items: center;
            max-width: 400px;
            margin-top: -100px;
            padding: 20px auto;
            right: 16em;
            position: absolute;
            /* flex-direction: column;
            justify-content: center;
            align-items: center; */
        }
        .logoPoltek {
            width: 200px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        form {
            display: flex; /* Use flexbox */
            flex-direction: column; /* Arrange children in a column */
            align-items: center; /* Center items horizontally */
            width: 100%; /* Ensure it takes full width */
        }
        input {
            width: 150%; /* Ensure input fields take full width */
            padding: 10px; /* Match the padding */
            margin-bottom: 15px; /* Space between fields */
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 15px; /* Match the font size */
        }

        button {
            width: 100%; /* Full width */
            max-width: 150px; /* Optionally limit the maximum width */
            padding: 10px; /* Match padding with input fields */
            background: linear-gradient(135deg, #007bff, #00d4ff); /* Gradient background */
            border: none;
            color: white;
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            font-size: 15px; /* Match font size */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add shadow */
            transition: background 0.3s, transform 0.2s, box-shadow 0.3s; /* Smooth transitions */
        }

        button:hover {
            background: linear-gradient(135deg, #0056b3, #00aaff); /* Darker gradient on hover */
            transform: scale(1.05); /* Scale up on hover */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3); /* Darker shadow on hover */
            border: 2px solid #0056b3; /* Solid border on hover */
        }
        .title {
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        h2 {
            text-align: center;
        }
        .error{
            color: red; /* Red color for error messages */
            margin-top: 10px; /* Space above the error message */
        }
    </style>
</head>
<body>
    <!-- <div class="container"> -->
    <div class="left-side">
            <div class="welcome-header">
                <h1>Selamat datang di<br>GoPres Polinema!</h1>
                <img src="asset/logoGopres.png" alt="Star Logo" class="star-logo">
            </div>
    </div>
    <div class="logs">
        <h2 class="title">Pusat Prestasi Mahasiswa</h2>
        <p class="subtitle">Jurusan Teknologi Informasi</p>
        <img src="asset/logoPoltek.png" alt="Polinema Logo" class="logoPoltek">
        <div class="error">
            <?php if (!empty($message)): ?>
                <?php echo htmlspecialchars($message); ?>
            <?php endif; ?>
        </div>
    </div>
        <div class="container">
            <!-- <h2>Login</h2> -->
            <form method="POST" action="">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>