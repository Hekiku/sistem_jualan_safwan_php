<?php

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapatkan maklumat produk
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
  $warna = ucwords($row['warna']);
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
        <?php include 'inc/menu.php'?>
      </ul>
    </header>
    <div class="content">
      <div class="btnUbahSaiz">
        <button onclick="ubahSaizFont(5)">+</button>
        <button onclick="ubahSaizFont(-5)">-</button>
      </div>
      <div class="produk">
          <img src="img/<?php echo $gambar?>">
          <p class="namaProduk teks"><?php echo $namaProduk?></p>
          <p class="lbl teks">Jenama:</p><p class="detail teks"><?php echo $jenama?></p>
          <p class="lbl teks">Saiz:</p><p class="detail teks"><?php echo $saiz?></p>
          <p class="lbl teks">Warna:</p><p class="detail teks"><?php echo $warna?></p>
          <p class="hargaProduk teks"><?php echo $harga?></p>
          <form class="brgBandingPilih" action="" method="post">
              <button type="submit" name="banding">Banding</button>
              <button type="submit"name="pilih">Pilih</button>
          </form>
      </div>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
  </body>
</html>
