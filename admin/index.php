<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home | Inventory Barang</title>
  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>

<body>
  <!-- Cek Login -->
  <?php include '../inc/cek-login.php'; ?>

  <!-- Definisi Fungsi Rupiah -->
  <?php
  function rupiah($angka) {
      return "Rp " . number_format($angka, 2, ',', '.');
  }
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Inventory Barang Java Network</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" autofocus>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $_SESSION['username']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="pass.php"><i class="fas fa-cog"></i> Ganti Password ..</a>
              <a class="dropdown-item" href="https://github.com/Muhamadali010/Inventory.git" target="_blank"><i class="fab fa-github"></i> View on GitHub ..</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <?php
    if (isset($_GET['pesan'])) {
      $pesan = $_GET['pesan'];
      if ($pesan == "input") {
        echo "Data berhasil di input.";
      } else if ($pesan == "update") {
        echo "Data berhasil di update.";
      } else if ($pesan == "hapus") {
        echo "Data berhasil di hapus.";
      }
    }
    ?>

    <h2>Daftar Barang</h2>
    <p>Untuk mengedit data, silahkan klik tombol edit di ujung kanan.</p> <br><br>
    <a href="input.php">+ Tambah Barang</a>
    <a href="export.php" class="btn btn-success">Export to Excel</a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Kode Barang</th>
          <th>Nama Barang</th>
          <th>Status Barang</th>
          <th>Penyimpanan</th>
          <th>Harga Barang</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "../inc/koneksi.php";
        $query_mysql = $conn->query("SELECT * FROM barang") or die($conn->error);

        while ($data = $query_mysql->fetch_assoc()) {
        ?>
          <tr>
            <td>rz<?php echo $data['id']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo $data['status_barang']; ?></td>
            <td><?php echo $data['penyimpanan_barang']; ?></td>
            <td><?php echo rupiah($data['harga_barang']); ?></td>
            <td><a href="edit.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-warning">Edit</button></a>
              <a href="hapus.php?id=<?php echo $data['id']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../assets/js/jquery.slim.js"></script>
  <script src="../assets/js/bootstrap.bundle.js"></script>

</body>

</html>
