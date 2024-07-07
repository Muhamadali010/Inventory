<?php
include '../inc/koneksi.php';
session_start();

// Periksa apakah sesi username ada
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit();
}

$username = $_SESSION['username'];
$current_password = md5($_POST['current_password']);
$new_password = md5($_POST['new_password']);

// Verifikasi password lama
$stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
$stmt->bind_param("ss", $username, $current_password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update password baru
    $stmt = $conn->prepare("UPDATE admin SET password=? WHERE username=?");
    $stmt->bind_param("ss", $new_password, $username);
    if ($stmt->execute()) {
        echo "Password berhasil diubah!";
    } else {
        echo "Terjadi kesalahan saat mengubah password.";
    }
} else {
    echo "Password lama tidak sesuai.";
}

$stmt->close();
$conn->close();
?>
