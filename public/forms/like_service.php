<?php
// Validasi Metode Request
// Koneksi Database
$conn = new mysqli("localhost", "username", "password", "nama_database");
if ($conn->connect_error) {
    header("Location: ../index.php?status=error");
    exit();
}

// Simpan ke Database
$stmt = $conn->prepare("INSERT INTO likes (email) VALUES (?)");
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    header("Location: ../index.php?status=success");
} else {
    header("Location: ../index.php?status=error");
}

$stmt->close();
$conn->close();

?>
