<?php
if (isset($_POST['banding'])){
    session_start();
    $idProduk = $_POST['idProduk'];
    array_push($_SESSION['banding'], $idProduk);
    echo "
    <script>
        alert('Produk dimasukkan ke dalam senarai banding');
        window.location.href = '../senarai_produk.php';
    </script>
    ";
} elseif (isset($_POST['pilih'])) {
    require_once 'database.php';
    session_start();

    date_default_timezone_set('Asia/Kuala_Lumpur');

    $idProduk = $_POST['idProduk'];
    $idPengguna = $_SESSION['idPengguna'];
    $tarikh = date("Y-m-d");
    $masa = date("H:i:s");

    $sql = "SELECT * FROM pembelian
            WHERE idProduk = '$idProduk' AND
                  idPengguna = '$idPengguna'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        echo "
        <script>
            alert('Produk telah ada senarai pilihan');
            window.location.href = '../senarai_produk.php';
        </script>
        ";
    }

    $sql = "INSERT INTO pembelian(
            tarikh, masa, idPengguna, idProduk)
            VALUES(
            '$tarikh',
            '$masa',
            '$idPengguna',
            '$idProduk')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
            alert('Produk dimasukkan ke dalam senarai pilhan');
            window.location.href = '../senarai_produk.php';
        </script>
        "; 
    } else {
        echo "
        <script>
            alert('Produk gagal dimasukkan ke dalam senarai banding');
            window.location.href = '../senarai_produk.php';
        </script>
        ";
    }
} else {
    header("Location: ../index.php?ralat=aksestidakdibenarkan");
}


?>