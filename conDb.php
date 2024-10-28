<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyoba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

// $username = "admin";
// $password = password_hash("admin", PASSWORD_DEFAULT);

// $sql = "INSERT INTO akun (username, password) VALUES (?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ss", $username, $password);
// $stmt->execute();

// echo "Data berhasil disimpan";
// // $stmt->close();
// // $conn->close();
?>