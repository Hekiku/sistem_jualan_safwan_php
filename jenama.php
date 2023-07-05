<?php
session_start();

# Berhubung dengan database
require_once 'inc/database.php';

# Mendapat senarai jenama
$sql = "SELECT * FROM jenama";
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
      <h1 class="teks">Senarai Jenama</h1>
      <div class="senarai">
        <table>
          <tr>
            <th>Bil</th>
            <th>Jenama</th>
            <th>Hapus</th>
          </tr>
          <?php
          $bil = 1;
          while ($row = mysqli_fetch_assoc($result)) {
            $idJenama = $row['idJenama'];
            $jenama = $row['jenama'];
          ?>
          <tr>
            <td><?php echo $bil?></td>
            <td><?php echo $jenama?></td>
            <td>
              <form action="inc/jenama-inc.php" method="post">
                <input type="hidden" name="idJenama" value="<?php echo $idJenama?>">
                <button type="submit" name="hapus">Hapus</button>
              </form>
            </td>
          </tr>
          <?php 
          $bil += 1;
          }
          ?>
        </table>
        <form action="inc/jenama-inc.php" method="post" class="borang" enctype="multipart/form-data">
          <label for="failJenama">Muat Naik Jenama</label>
          <input type="file" name="failJenama" id="failJenama" required>
          <button type="submit" name="muatnaik">Muat Naik</button>
        </form>
      </div>
    </div>
    <footer>
        <p>Hakcipta Terpelihara Safwan 2022 &copy;</p>
    </footer>
    <script src="scripts.js"></script>
    <script>
      document.getElementById("page10").style.backgroundColor="deepskyblue";
    </script>
  </body>
</html>
