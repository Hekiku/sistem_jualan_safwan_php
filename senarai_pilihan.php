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
            $idProduk = $row['idProduk'];
            $tarikh = date('d/m/Y', strtotime($row['tarikh']));
            $masa = date('h:i A', strtotime($row['masa']));
          }
          ?>
          <tr>
            <td>
              <a href="produk.html">
                <img src="img/al_prestigious_cup_johor.jpg">
              </a>
            </td>
            <td>Al Prestigious Cup Johor</td>
            <td>Adidas</td>
            <td>L</td>
            <td>Biru</td>
            <td>RM 45.00</td>
            <td>
              <p>29/11/2022</p>
              <p>12.30 pm</p>
              <a class="print" href="">Hapus</a>
            </td>
          </tr>
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
