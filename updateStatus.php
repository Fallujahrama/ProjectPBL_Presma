<?php
session_start();
include 'db_connect.php';

echo "test0";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $status = $_POST["status"];

    // Update the status in the database
    $sql = "UPDATE kompetisiCo SET status_validasi = ? WHERE id_kompetisi = ?";
    $params = [$status, $id];
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Redirect back to the admin dashboard
    header("Location: dashAdm.php");
    exit();
}

// Close the database connection
sqlsrv_close($conn);
?>