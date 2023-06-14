<?php
session_start();

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapat produk pilihan pengguna
$idPengguna = $_SESSION['idPengguna'];
$sql = "SELECT *
        FROM pembelian
        WHERE idPengguna = '$idPengguna'";
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
      <h1 class="teks">Senarai Pilihan</h1>
      <div class="senarai">
        <table>
          <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jenama</th>
            <th>Saiz</th>
            <th>Warna</th>
            <th>Harga</th>
            <th>Tarikh & Waktu</th>
          </tr>
          <?php
          while ($row = mysqli_fetch_assoc($result)){
            $idPembelian = $row['idPembelian'];
            $idProduk = $row['idProduk'];
            $tarikh = date('d/m/Y', strtotime($row['tarikh']));
            $masa = date('h:i A', strtotime($row['masa']));

            $sql2 = "SELECT * 
                     FROM produk p
                     INNER JOIN jenama j
                     ON p.idJenama = j.idJenama
                     WHERE idProduk = '$idProduk'";
            $result2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
              $namaProduk = $row2['namaProduk'];
              $jenama = $row2['jenama'];
              $saiz = $row2['saiz'];
              $warna = ucwords($row2['warna']);
              $harga = $row2['harga'];
              $gambar = $row2['gambar'];
            }
          ?>
          <tr>
            <td>
              <a href="produk.html">
                <img src="img/<?php echo $gambar?>">
              </a>
            </td>
            <td><?php echo $namaProduk?></td>
            <td><?php echo $jenama?></td>
            <td><?php echo $saiz?></td>
            <td><?php echo $warna?></td>
            <td>RM <?php echo $harga?></td>
            <td>
              <p><?php echo $tarikh?></p>
              <p><?php echo $masa?></p>
              <a class="print" href="inc/hapus-inc.php?idPembelian=<?php echo $idPembelian?>">Hapus</a>
            </td>
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
      document.getElementById("page5").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
