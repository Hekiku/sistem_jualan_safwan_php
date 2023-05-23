<?php
session_start();
if($_SESSION['status'] != "admin"){
  header("Location: index.php?ralat=aksestidakdibenarkan");
}

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapatkan maklumat berkenaan produk
$idProduk = $_GET['idProduk'];
$sql = "SELECT * 
        FROM produk p
        INNER JOIN jenama j
          ON p.idJenama = j.idJenama
        WHERE idProduk = '$idProduk';";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
  $namaProduk = $row['namaProduk'];
  $saiz = $row['saiz'];
  $warna = $row['warna'];
  $harga = $row['harga'];
  $gambar = $row['gambar'];
  $jenama = $row['jenama'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kedai Jersi Utara</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <p class="header">KEDAI JERSI UTARA</p>
      <ul class="menu">
        <li id="page1"><a href="index.html">HALAMAN UTAMA</a></li>
        <li id="page2"><a href="senarai_produk.html">SENARAI JERSI</a></li>
        <li id="page8"><a href="tambah_produk.html">TAMBAH PRODUK</a></li>
        <li id="page9"><a href="senarai_pilihan_pengguna.html">PILIHAN PENGGUNA</a></li>
        <li id="page7"><a href="logkeluar.html">LOG KELUAR</a></li>
    </ul>
    </header>
    <div class="content">
      <div class="btnUbahSaiz">
        <button onclick="ubahSaizFont(5)">+</button>
        <button onclick="ubahSaizFont(-5)">-</button>
      </div>
      <h1 class="teks">Kemaskini Produk</h1>
      <form class="borang" action="inc/kemaskini-inc.php" method="post">
        <input type="hidden" name="idProduk" value="<?php echo $idProduk?>">
        <input type="hidden" name="gambar" value="<?php echo $gambar?>">
        <label for="namaProduk">Nama Produk</label>
        <input type="text" name="namaProduk" id="namaProduk" required value="<?php echo $namaProduk?>">
        <label for="jenama">Jenama</label>
        <input type="text" name="jenama" id="jenama" required value="<?php echo $jenama?>">
        <label for="saiz">Saiz</label>
        <select name="saiz" id="saiz" required>
          <option value="XS" <?php if($saiz == "XS"){echo "selected";}?>>XS</option>
          <option value="S" <?php if($saiz == "S"){echo "selected";}?>>S</option>
          <option value="M" <?php if($saiz == "M"){echo "selected";}?>>M</option>
          <option value="L" <?php if($saiz == "L"){echo "selected";}?>>L</option>
          <option value="XL" <?php if($saiz == "XL"){echo "selected";}?>>XL</option>
          <option value="XXL" <?php if($saiz == "XXL"){echo "selected";}?>>XXL</option>
        </select>
        <label for="warna">Warna</label>
        <input type="text" name="warna" id="warna" required value="<?php echo $warna?>">
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" min="10" max="1000" step="0.01" required value="<?php echo $harga?>">
        <label for="gambarBaru">Gambar</label>
        <input type="file" name="gambarBaru" id="gambarBaru">
        <button type="submit" name="kemaskini">Kemaskini</button>
        <button type="submit" name="hapus">Hapus</button>
      </form>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
  </body>
</html>
