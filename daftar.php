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
      <h1 class="teks">Pendaftaran Pengguna</h1>
      <form class="borang" action="inc/daftar-inc.php" method="post">
        <label for="idPengguna">ID Pengguna</label>
        <input type="text" name="idPengguna" id="idPengguna" required>
        <label for="kataLaluan">Kata Laluan</label>
        <input type="password" name="kataLaluan" id="kataLaluan" minlength="8" maxlength="10" required>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" pattern="[A-Za-z ]+" title="Sila guna huruf sahaja" required>
        <label for="noTelefon">No Telefon</label>
        <input type="text" name="noTelefon" id="noTelefon" pattern="[0-9]+" title="Sila masukkan nombor sahaja">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <button type="submit" name="daftar">Daftar</button>
      </form>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
  </body>
</html>
