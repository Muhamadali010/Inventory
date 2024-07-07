<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Edit Data Barang | Inventory Barang</title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>

<body>
<!-- Cek Login -->
<?php include '../inc/cek-login.php'; ?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Inventory Barang</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="pass.php"><i class="fas fa-cog"></i> Ganti Password ..</a>
              <a class="dropdown-item" href="https://github.com/muhrizki1996/aplikasi-inventory-barang-sederhana-php/" target="_blank"><i class="fab fa-github"></i> View on GitHub ..</a>
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
    <h2>Edit Data Barang</h2>
    <p><a href="index.php">Lihat Semua Daftar Barang</a></p>
    <?php 
      include "../inc/koneksi.php";
      $id = $_GET['id'];
      // Menggunakan prepared statement untuk mengambil data barang berdasarkan id
      $stmt = $conn->prepare("SELECT * FROM barang WHERE id=?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      while($data = $result->fetch_assoc()){
    ?>
    <form action="update.php" method="post">
      <label for="id">Kode Barang</label><br>		
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="id">rz</span>
        </div>
        <input type="text" class="form-control" placeholder="Kode Barang" aria-label="id" name="id" value="<?php echo $data['id'] ?>" aria-describedby="basic-addon1">
      </div>
      <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" aria-label="nama_barang" placeholder="Nama Barang" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" autofocus>
      </div>
      <div class="form-group">
        <label for="status_barang">Status Barang</label>
        <input type="text" class="form-control" id="status_barang" aria-label="status_barang" placeholder="Status Barang" name="status_barang" value="<?php echo $data['status_barang'] ?>">
      </div>
      <div class="form-group">
        <label for="penyimpanan_barang">Penyimpanan Barang</label>
        <input type="text" class="form-control" id="penyimpanan_barang" aria-label="penyimpanan_barang" placeholder="Penyimpanan Barang" name="penyimpanan_barang" value="<?php echo $data['penyimpanan_barang'] ?>">
      </div>
      <div class="form-group">
        <label for="qty_barang">Qty Barang</label>
        <input type="number" class="form-control" id="qty_barang" aria-label="qty_barang" placeholder="Qty Barang" name="qty_barang" value="<?php echo $data['qty_barang'] ?>">
      </div>
      <label for="harga_barang">Harga</label><br>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Rp</span>
        </div>
        <input type="text" class="form-control" aria-label="Harga" name="harga_barang" value="<?php echo $data['harga_barang'] ?>">
        <div class="input-group-append">
          <span class="input-group-text">,00</span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    <?php } ?>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../assets/js/jquery.slim.js"></script>
  <script src="../assets/js/bootstrap.bundle.js"></script>

</body>
</html>
