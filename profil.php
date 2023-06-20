<?php
session_start();
if ($_SESSION['status'] != 'pengguna') {
  header("Location: index.php?ralat=aksestidakdibenarkan");
}

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapatkan maklumat pengguna
$idPengguna = $_SESSION['idPengguna'];
$sql = "SELECT * FROM pengguna WHERE idPengguna = '$idPengguna'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
  $kataLaluan = $row['kataLaluan'];
  $nama = $row['nama'];
  $noTelefon = $row['noTelefon'];
  $email = $row['email'];
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
      <h1 class="teks">Kemaskini Maklumat Pengguna</h1>
      <form class="borang" action="inc/profil-inc.php" method="post">
        <label for="idPengguna">ID Pengguna</label>
        <input type="text" name="idPengguna" id="idPengguna" readonly value="<?php echo $idPengguna?>">
        <label for="kataLaluan">Kata Laluan</label>
        <input type="password" name="kataLaluan" id="kataLaluan" minlength="8" maxlength="10" required value="<?php echo $kataLaluan?>">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" pattern="[A-Za-z ]+" title="Sila guna huruf sahaja" required value="<?php echo $nama?>">
        <label for="noTelefon">No Telefon</label>
        <input type="text" name="noTelefon" id="noTelefon" pattern="[0-9]+" title="Sila masukkan nombor sahaja" value="<?php echo $noTelefon?>">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $email?>">
        <button type="submit" name="kemaskini">Kemaskini</button>
      </form>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
      document.getElementById("page6").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
