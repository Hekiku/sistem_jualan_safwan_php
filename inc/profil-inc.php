<?php

if(isset($_POST['kemaskini'])) {
    require_once 'database.php';

    $idPengguna = $_POST['idPengguna'];
    $kataLaluan = $_POST['kataLaluan'];
    $nama = $_POST['nama'];
    $noTelefon = $_POST['noTelefon'];
    $email = $_POST['email'];

    $sql = "UPDATE pengguna
            SET
                kataLaluan = '$kataLaluan',
                nama = '$nama',
                noTelefon = '$noTelefon',
                email = '$email'
            WHERE
                idPengguna = '$idPengguna'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
            alert('Kemaskini berjaya.');
            window.location.href = '../profil.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Kemaskini gagal.');
            window.location.href = '../profil.php';
        </script>
        ";
    }
} else {
    header("Location: ../index.php?ralat=aksestidakdibenarkan");
}


?>