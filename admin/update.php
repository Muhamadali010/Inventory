<?php
include '../inc/koneksi.php';

$id = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$status_barang = $_POST['status_barang'];
$penyimpanan_barang = $_POST['penyimpanan_barang'];
$qty_barang = $_POST['qty_barang'];
$harga_barang = $_POST['harga_barang'];

// Menggunakan prepared statement untuk meng-update data barang berdasarkan id
$stmt = $conn->prepare("UPDATE barang SET nama_barang=?, status_barang=?, penyimpanan_barang=?, qty_barang=?, harga_barang=? WHERE id=?");
$stmt->bind_param("sssisi", $nama_barang, $status_barang, $penyimpanan_barang, $qty_barang, $harga_barang, $id);

if ($stmt->execute()) {
    header("location:index.php?pesan=update");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
