<?php
$conn = mysqli_connect("localhost", "root", "", "db_laundry");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $paket = ($data["paket"]);
    $pembayaran = ($data["pembayaran"]);
    $status = htmlspecialchars($data["status"]);
    $berat = htmlspecialchars($data["berat"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO data_londry VALUES ('','$nama','$alamat','$status','$paket',
  '$pembayaran','$status','$berat','$harga','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
            alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    $gambarvalid = ['jpg', 'jpeg', 'png'];
    $eksengambar = explode('.', $namaFile);
    $eksengambar = strtolower(end($eksengambar));
    if (!in_array($eksengambar, $gambarvalid)) {
        echo "<script>
            alert('silakan pilih gambar kembali');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran foto terlalu besar');
    </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $eksengambar;
    move_uploaded_file($tmpName, 'image/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_londry WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $paket = ($data["paket"]);
    $pembayaran = ($data["pembayaran"]);
    $status = htmlspecialchars($data["status"]);
    $berat = htmlspecialchars($data["berat"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarlama = htmlspecialchars($data["gambarlama"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE data_londry SET nama ='$nama', alamat ='$alamat',
  telepon = '$telepon', paket= '$paket',
  pembayaran = '$pembayaran', status = '$status', berat = '$berat', harga = '$harga',gambar = '$gambar'
  WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($key)
{
    $query = "SELECT * FROM data_londry WHERE 
    nama LIKE '%$key%' OR
    alamat LIKE '%$key%' OR
    telepon LIKE '%$key%' OR
    berat LIKE '%$key%' OR
    harga LIKE '%$key%'
    ";

    return query($query);
}
