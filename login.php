<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoPres Polinema - Login</title>
    <link rel="stylesheet" href="styleLogin.css">
</head>
<body>
    <div class="container">
        <!-- Left Side -->
        <div class="left-side">
            <div class="welcome-header">
                <h1>Selamat datang Di<br>GoPres Polinema!</h1>
                <img src="asset/logoGopres.jpg" alt="Star Logo" class="star-logo">
            </div>
            <img src="asset/backgroundImage.jpg" alt="Welcome Illustration" class="welcome-image">
        </div>

        <!-- Right Side -->
        <div class="right-side">
            <div class="login-container">
                <img src="asset/logoPoltek.jpg" alt="Polinema Logo" class="logo">
                <h2 class="title">Pusat Prestasi Mahasiswa</h2>
                <p class="subtitle">Jurusan Teknologi Informasi</p>
                
                <!-- Login Form -->
                <form id="loginForm" onsubmit="return handleLogin(event)">
                    <div class="input-group">
                        <div class="input-icon">
                            <img src="asset/Profile.jpg" alt="Username Icon" class="icon">
                            <input type="text" id="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="input-icon">
                            <img src="asset/Key.jpg" alt="Password Icon" class="icon">
                            <input type="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button type="submit" class="login-btn">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript file -->
    <script src="script.js"></script>
</body>
</html>