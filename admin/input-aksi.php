<?php
include '../inc/koneksi.php';

$id = $_POST['id'];
$nama_barang = $_POST['nama_barang'];
$status_barang = $_POST['status_barang'];
$penyimpanan_barang = $_POST['penyimpanan_barang'];
$qty_barang = $_POST['qty_barang'];
$harga_barang = $_POST['harga_barang'];

$query = "INSERT INTO barang (id, nama_barang, status_barang, penyimpanan_barang, qty_barang, harga_barang) 
          VALUES ('$id', '$nama_barang', '$status_barang', '$penyimpanan_barang', '$qty_barang', '$harga_barang')";
          
if ($conn->query($query) === TRUE) {
    header("location:index.php?pesan=input");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>
