<?php

if (isset($_POST['daftar'])) {
    require_once 'database.php';

    $idPengguna = $_POST['idPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $nama = $_POST['nama'];
    $noTelefon = $_POST['noTelefon'];
    $email = $_POST['email'];
    
    $sql = "SELECT * FROM pengguna WHERE idPengguna = '$idPengguna'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        echo "
        <script>
            alert('ID Pengguna telah wujud. Sila pilih ID Pengguna lain.');
            window.location.href = '../daftar.php';
        </script>
        ";
    } else {
        $sql = "INSERT INTO pengguna
                VALUES (
                    '$idPengguna',
                    '$kataLaluan',
                    '$nama',
                    '$noTelefon',
                    '$email'
                )";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "
            <script>
                alert('Pendaftaran berjaya.');
                window.location.href = '../logmasuk.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Pendaftaran gagal.');
                window.location.href = '../daftar.php';
            </script>
            ";
        }
    }
} else {
    header("Location: ../daftar.php?ralat=aksestidakdibenarkan");
}

?>