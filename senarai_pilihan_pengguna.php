<?php
session_start();

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapat produk pilihan pengguna
$sql = "SELECT
          COUNT(idPengguna) AS bil,
          pmb.idProduk,
          namaProduk,
          idJenama,
          harga,
          gambar
        FROM pembelian pmb
        INNER JOIN produk prd
        ON pmb.idProduk = prd.idProduk
        GROUP BY idProduk
        ORDER BY bil DESC";
$result = mysqli_query($conn, $sql);

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
      <ul class="menu print">
        <?php include 'inc/menu.php'?>
      </ul>
    </header>
    <div class="content">
      <div class="btnUbahSaiz print">
        <button onclick="ubahSaizFont(5)">+</button>
        <button onclick="ubahSaizFont(-5)">-</button>
      </div>
      <h1 class="teks">Senarai Pilihan Pengguna</h1>
      <div class="senarai">
        <table>
          <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jenama</th>
            <th>Harga</th>
            <th>Bil. Pengguna</th>
          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
            $bil = $row['bil'];
            $idProduk = $row['idProduk'];
            $namaProduk = $row['namaProduk'];
            $idJenama = $row['idJenama'];
            $harga = $row['harga'];
            $gambar = $row['gambar'];

            $sql2 = "SELECT jenama FROM jenama WHERE idJenama = '$idJenama'";
            $result2 = mysqli_query($conn, $sql2);
            $jenama = mysqli_fetch_assoc($result2)['jenama'];
          ?>
          <tr>
            <td>
              <a href="produk_kemaskini.php?idProduk=<?php echo $idProduk?>">
                <img src="img/<?php echo $gambar?>">
              </a>
            </td>
            <td><?php echo $namaProduk?></td>
            <td><?php echo $jenama?></td>
            <td>RM <?php echo $harga?></td>
            <td><?php echo $bil?></td>
          </tr>
          <?php 
          }
          ?>
        </table>
        <button  class="print" onclick="window.print(); return false;">Cetak</button>
      </div>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
      document.getElementById("page9").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
