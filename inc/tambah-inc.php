<?php

if (isset($_POST['tambah'])) {
    include_once 'database.php';

    $namaProduk = $_POST['namaProduk'];
    $jenama = $_POST['jenama'];
    $saiz = $_POST['saiz'];
    $warna = $_POST['warna'];
    $harga = $_POST['harga'];

    # Dapatkan idJenama
    $sql = "SELECT idJenama FROM jenama WHERE jenama='$jenama'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $idJenama = mysqli_fetch_assoc($result)['idJenama'];
    } else {
        $sql2 = "INSERT INTO jenama(jenama)
                 VALUES ('$jenama')";
        $result2 = mysqli_query($conn, $sql2);
        $idJenama = mysqli_insert_id($conn);
    }

    # Masukkan maklumat dalam pangkalan data
    $sql = "INSERT INTO produk(namaProduk, idJenama, saiz, warna, harga)
            VALUES (
                '$namaProduk',
                '$idJenama',
                '$saiz',
                '$warna',
                '$harga')
            ";
    $result = mysqli_query($conn, $sql);
    $idProduk = mysqli_insert_id($conn);

    if ($_FILES['gambar']['size'] > 0) {
        # Muat naik gambar baru
        $folderGambar = "../img/";
        $gambarMuatNaik = basename($_FILES['gambar']['name']);
        $jenisFail = strtolower(pathinfo($gambarMuatNaik)['extension']);
        $gambar = $namaProduk . '.' . $jenisFail;
        $lokasiGambar = $folderGambar . $gambar;

        if ($jenisFail != "jpg" && $jenisFail != "jpeg" && $jenisFail != "png"){
            echo "
            <script>
                alert('Hanya gambar jenis JPG, JPEG & PNG yang dibenarkan.');
                window.location.href = '../produk_kemaskini.php?idProduk=$idProduk';
            </script>
            ";
        } else {
            $namaSementara = $_FILES['gambar']['tmp_name'];
            $pindahGambar = move_uploaded_file($namaSementara, $lokasiGambar);

            # Masukkan maklumat gambar terbaharu
            $sql = "UPDATE produk
                    SET gambar = '$gambar'
                    WHERE idProduk = '$idProduk'";
            $result = mysqli_query($conn, $sql);
        }
    }
    echo "
    <script>
        alert('Produk berjaya ditambah');
        window.location.href = '../produk_kemaskini.php?idProduk=$idProduk';
    </script>
    ";
} else {
    header("Location: ../tambah_produk.php?ralat=aksestidakdibenarkan");
}

?>