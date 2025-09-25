<?php
// Simpan ini di file insert_user.php untuk uji coba
include "db.php";

$username = "kasir1";
$password = password_hash("12345", PASSWORD_DEFAULT);
$role = "Kasir";

$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
if ($conn->query($sql)) {
    echo "User berhasil ditambahkan!";
} else {
    echo "Error: " . $conn->error;
}
?>
