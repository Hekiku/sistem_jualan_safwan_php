<?php
session_start();

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapat produk pilihan pengguna
$idPengguna = $_SESSION['idPengguna'];
$senaraiBanding = $_SESSION['banding'];

# Mengosongkan senarai perbandingan
if (isset($_POST['reset'])) {
  $_SESSION['banding'] = [];
  echo "
  <script>
    alert('Senarai banding telah dikosongkan');
    window.location.href = 'senarai_produk.php';
  </script>
  ";
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
      <h1 class="teks">Senarai Banding</h1>
      <div class="senarai">
        <?php
        if (count($senaraiBanding) > 0) {
        ?>
        <table>
          <tr>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Jenama</th>
            <th>Saiz</th>
            <th>Warna</th>
            <th>Harga</th>
          </tr>
          <?php
          foreach ($senaraiBanding as $idProduk) {
            $sql = "SELECT * 
                    FROM produk p
                    INNER JOIN jenama j
                      ON p.idJenama = j.idJenama
                    WHERE idProduk = '$idProduk'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $namaProduk = $row['namaProduk'];
            $jenama = $row['jenama'];
            $saiz = $row['saiz'];
            $warna = ucwords($row['warna']);
            $harga = $row['harga'];
            $gambar = $row['gambar'];
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
          </tr>
          <?php
          }
          ?>
        </table>
        <form action="" method="post">
          <button type="submit" name="reset">Reset</button>
        </form>
        <?php
        } else {
          echo "<p>Tiada produk untuk dibandingkan</p>";
        }
        ?>
        
      </div>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
      document.getElementById("page4").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
