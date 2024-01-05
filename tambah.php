<?php
include_once 'Connection.php';
if (isset($_POST["submit"])) {

  if (tambah($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil ditambahkan');
      document.location.href = 'admin.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('data gagal ditambahkan');
      document.location.href = 'admin.php';
    </script>
    ";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Tambah data</title>
  <style>
    body {
      margin: 0;
      padding: 10px;
    }

    .row {
      padding: 20px;
    }
  </style>
</head>

<body>
  <form action="" method="post" enctype="multipart/form-data">
    <h1>Tambah Data Customer Laundry</h1>
    <div class="col-md-6">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="telepon" class="form-label">telepon</label>
      <input type="number" name="telepon" class="form-control" id="telepon" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="paket" class="form-label">Paket</label>
      <input type="text" name="paket" class="form-control" id="paket" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="pembayaran" class="form-label">Pembayaran</label>
      <select id="pembayaran" name="pembayaran" class="form-select" required autocomplete="off">
        <option>Belum Lunas</option>
        <option>Lunas</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="status" class="form-label">status</label>
      <input type="text" name="status" class="form-control" id="status" required autocomplete="off">
    </div>
    <div class="col-md-6">
      <label for="berat" class="form-label">Berat</label>
      <input type="text" name="berat" class="form-control" id="berat" required>
    </div>
    <div class="col-md-6">
      <label for="harga" class="form-label">harga</label>
      <input type="text" name="harga" class="form-control" id="harga" required>
    </div>
    <div class="col-6">
      <label for="gambar" class="form-label">Gambar</label>
      <input type="file" name="gambar" class="form-control" id="gambar">
    </div>
    <div class="col-12 mt-4">
      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </div>
  </form>
</body>

</html>