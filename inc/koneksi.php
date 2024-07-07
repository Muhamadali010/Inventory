<?php
// Informasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inv-barang2"; // ganti dengan nama database yang sudah Anda buat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil!";
}
?>