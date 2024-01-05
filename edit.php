<?php

include_once 'Connection.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM data_londry WHERE id = $id")[0];


if (isset($_POST["submit"])) {

  if (edit($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil diedit');
      document.location.href = 'admin.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('data gagal diedit');
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
  <title>Edit data</title>
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
    <h1>Edit Data Customer Laundry </h1>
    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
    <input type="hidden" name="gambarlama" value="<?= $mhs["gambar"]; ?>">
    <div class="col-md-6">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" required autocomplete="off" value="<?= $mhs["nama"] ?>">
    </div>
    <div class="col-md-6">
      <label for="alamat" class="form-label">Alamat</label>
      <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat" required autocomplete="off" value="<?= $mhs["alamat"] ?>">
    </div>
    <div class="col-md-6">
      <label for="telepon" class="form-label">telepon</label>
      <input type="text" name="telepon" class="form-control" id="telepon" required autocomplete="off" value="<?= $mhs["telepon"] ?>">
    </div>
    <div class="col-md-6">
      <label for="paket" class="form-label">Paket</label>
      <input type="text" name="paket" class="form-control" id="paket" required autocomplete="off" value="<?= $mhs["paket"] ?>">
    </div>
    <div class="col-md-6">
      <label for="pembayaran" class="form-label">Pembayaran</label>
      <select id="pembayaran" name="pembayaran" class="form-select" required autocomplete="off" value="<?= $mhs["pembayaran"] ?>">
        <option>Belum Lunas</option>
        <option>Lunas</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="status" class="form-label">Status</label>
      <input type="text" name="status" class="form-control" id="status" required autocomplete="off" value="<?= $mhs["status"] ?>">
    </div>
    <div class="col-md-6">
      <label for="berat" class="form-label">Berat</label>
      <input type="text" name="berat" class="form-control" id="berat" required autocomplete="off" value="<?= $mhs["berat"] ?>">
    </div>
    <div class="col-md-6">
      <label for="harga" class="form-label">Harga</label>
      <input type="text" name="harga" class="form-control" id="harga" required autocomplete="off" value="<?= $mhs["harga"] ?>">
    </div>
    <div class="col-12">
      <label for="gambar" class="form-label">Gambar</label><br><img src="image/<?= $mhs["gambar"] ?>" width="50"><br>
      <input type="file" name="gambar" class="form-control" id="gambar" autocomplete="off" value="<?= $mhs["gambar"] ?>">
    </div>
    <div class="col-12 mt-3">
      <button type="submit" name="submit" class="btn btn-primary">Edit</button>
    </div>
  </form>
</body>

</html>