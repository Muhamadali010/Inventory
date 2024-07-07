<?php
include '../inc/koneksi.php';

$id = $_GET['id'];

// Menggunakan mysqli_query untuk menghapus data
$result = mysqli_query($conn, "DELETE FROM barang WHERE id='$id'");

if ($result) {
    header("location:index.php?pesan=hapus");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
