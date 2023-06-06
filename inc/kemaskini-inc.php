<?php

if (isset($_POST['kemaskini'])) {
    include_once 'database.php';

    $idProduk = $_POST['idProduk'];
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

    # Kemaskini maklumat produk
    $sql = "UPDATE produk
            SET
                namaProduk = '$namaProduk',
                idJenama = '$idJenama',
                warna = '$warna',
                saiz = '$saiz',
                harga = '$harga'
            WHERE
                idProduk = '$idProduk'";
    $result = mysqli_query($conn, $sql);

    if (isset($_FILES["gambarBaru"])) {
        # Muat naik gambar baru
        $folderGambar = "../img/";
        $gambarMuatNaik = basename($_FILES["gambarBaru"]["name"]);
        $jenisFail = strtolower(pathinfo($gambarMuatNaik)["extension"]);
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
            $namaSementara = $_FILES["gambarBaru"]["tmp_name"];
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
        alert('Kemaskini berjaya');
        window.location.href = '../produk_kemaskini.php?idProduk=$idProduk';
    </script>
    ";
} elseif (isset($_POST['hapus'])) {
    include_once 'database.php';
    
    $idProduk = $_POST['idProduk'];
    $gambar = $_POST['gambar'];

    $sql = "DELETE FROM produk WHERE idProduk = '$idProduk'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $file = '../img/' . $gambar;
        unlink($file);

        echo "
        <script>
            alert('Produk berjaya dihapuskan');
            window.location.href = '../senarai_produk.php';
        </script>
        ";
    }
} else {
    header("Location: ../index.php?ralat=aksestidakdibenarkan");
}

?>