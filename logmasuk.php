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
          <li id="page1"><a href="index.html">HALAMAN UTAMA</a></li>
          <li id="page2"><a href="senarai_produk.html">SENARAI JERSI</a></li>
          <li id="page3"><a href="logmasuk.html">LOG MASUK</a></li>
      </ul>
    </header>
    <div class="content">
      <div class="btnUbahSaiz">
        <button onclick="ubahSaizFont(5)">+</button>
        <button onclick="ubahSaizFont(-5)">-</button>
      </div>
      <h1 class="teks">Log Masuk</h1>
      <form class="borang" action="" method="post">
        <label for="idPengguna">ID Pengguna</label>
        <input type="text" name="idPengguna" id="idPengguna" required>
        <label for="kataLaluan">Kata Laluan</label>
        <input type="password" name="kataLaluan" id="kataLaluan" required>
        <button type="submit" name="logmasuk">Log Masuk</button>
        <p>Pengguna baharu? Klik <a href="daftar.php">di sini</a> untuk daftar</p>
      </form>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
      document.getElementById("page3").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
