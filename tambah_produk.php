<?php
session_start();
if($_SESSION['status'] != "admin"){
  header("Location: index.php?ralat=aksestidakdibenarkan");
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
        <?php include 'inc/menu.php'?>
      </ul>
    </header>
    <div class="content">
      <div class="btnUbahSaiz">
        <button onclick="ubahSaizFont(5)">+</button>
        <button onclick="ubahSaizFont(-5)">-</button>
      </div>
      <h1 class="teks">Tambah Produk</h1>
      <form class="borang" action="inc/tambah-inc.php" method="post" enctype="multipart/form-data">
        <label for="namaProduk">Nama Produk</label>
        <input type="text" name="namaProduk" id="namaProduk" required>
        <label for="jenama">Jenama</label>
        <input type="text" name="jenama" id="jenama" required>
        <label for="saiz">Saiz</label>
        <select name="saiz" id="saiz" required>
          <option value="" selected disabled></option>
          <option value="xs">XS</option>
          <option value="s">S</option>
          <option value="m">M</option>
          <option value="l">L</option>
          <option value="xl">XL</option>
          <option value="xxl">XXL</option>
        </select>
        <label for="warna">Warna</label>
        <input type="text" name="warna" id="warna" required>
        <label for="harga">Harga</label>
        <input type="number" name="harga" id="harga" min="10" max="1000" step="0.01" required>
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" required>
        <button type="submit" name="tambah">Tambah</button>
      </form>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
      document.getElementById("page8").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
