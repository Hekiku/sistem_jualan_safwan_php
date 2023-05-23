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

# Mendapatkan tiga produk
$sql = "SELECT * FROM produk ORDER BY RAND() LIMIT 3;";
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
      <h1 class="teks">Menarik Hari Ini</h1>
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
      document.getElementById("page1").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
