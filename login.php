<?php
session_start();
include "db.php"; // koneksi

$username = $_POST['username'];
$password = $_POST['password'];

// Cek user di database
$sql = "SELECT * FROM users WHERE username=? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Password dicek (disarankan pakai password_hash di database)
    if ($password === $row['password']) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role'] = $row['role'];

        // Redirect sesuai role
        if ($row['role'] == 'Owner') {
            header("Location: Owner\owner_dashboard.php");
        } elseif ($row['role'] == 'Manajer') {
            header("Location: manajer_dashboard.php");
        } elseif ($row['role'] == 'Kasir') {
            header("Location: Kasir\Kasir.php");
        }
        exit;
    } else {
        echo "Password salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}
?>
