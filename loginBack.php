<?php
session_start();
include('db_connect.php');
$message = "";

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
                    header("Location: SuperAdmin.php");
                } else if ($row['role'] === 'Admin') {
                    header("Location: Admin.php");
                } else if ($row['role'] === 'Mahasiswa') {
                    header("Location: Mahasiswa.php");
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