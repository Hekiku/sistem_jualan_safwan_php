<?php
session_start();
$page = "produk.php";
if(isset($_SESSION['status'])){
  $status = $_SESSION['status'];
  if($status == "admin"){
    $page = "produk_kemaskini.php";
  }
}

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapatkan produk
$namaProduk = "";
$hargaMin = "0";
$hargaMax = "9999";

if (isset($_POST['carian'])){
  $namaProduk = $_POST['namaProduk'];
  $hargaMin = $_POST['hargaMin'];
  $hargaMax = $_POST['hargaMax'];
}

$sql = "SELECT * 
        FROM produk
        WHERE namaProduk LIKE '%" . $namaProduk . "%' AND
        harga >= '$hargaMin' AND
        harga <= '$hargaMax';";
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
      <ul class="menu">
        <?php include 'inc/menu.php'?>
      </ul>
    </header>
    <div class="content">
      <div class="btnUbahSaiz">
        <button onclick="ubahSaizFont(5)">+</button>
        <button onclick="ubahSaizFont(-5)">-</button>
      </div>
      <h1 class="teks">Senarai Jersi</h1>
      <form action="" class="borang" method="post">
        <label for="namaProduk">Nama Produk</label>
        <input type="text" name="namaProduk" id="namaProduk">
        <label for="hargaMin">Harga Minimum</label>
        <input type="number" name="hargaMin" id="hargaMin" min="0" value="0">
        <label for="hargaMax">Harga Maximum</label>
        <input type="number" name="hargaMax" id="HargaMax" min="0" value="9999">
        <button type="submit" name="carian">Cari</button>
      </form>
      <div class="galeri">
        <?php
        while ($row = mysqli_fetch_assoc($result)){
          $idProduk = $row['idProduk'];
          $namaProduk = $row['namaProduk'];
          $gambar = $row['gambar'];
        ?>
        <div class="item">
            <a href="<?php echo $page?>?idProduk=<?php echo $idProduk?>">
              <img src="img/<?php echo $gambar?>">
              <p class="teks"><?php echo $namaProduk?></p>
            </a>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
      document.getElementById("page2").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
