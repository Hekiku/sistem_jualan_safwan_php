<?php

if (isset($_POST['logmasuk'])) {
    require_once 'database.php';

    $idPengguna = $_POST['idPengguna'];
    $kataLaluan = $_POST['kataLaluan'];

    $sql = "SELECT * FROM admin WHERE idPengguna = '$idPengguna'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount == 0) {
        $sql = "SELECT * FROM pengguna WHERE idPengguna = '$idPengguna'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount == 0) {
            echo "
            <script>
                alert('ID Pengguna tidak wujud. Sila daftar dahulu.');
                window.location.href = '../daftar.php';
            </script>
            ";
        } else {
            $status = "pengguna";
        }
    } else {
        $status = "admin";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $kataLaluanSebenar = $row['kataLaluan'];
        if($kataLaluan == $kataLaluanSebenar) {
            session_start();
            $_SESSION['idPengguna'] = $idPengguna;
            $_SESSION['status'] = $status;
            $_SESSION['banding'] = array();
            echo "
            <script>
                alert('Log masuk berjaya.');
                window.location.href = '../index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Kata laluan salah.');
                window.location.href = '../logmasuk.php';
            </script>
            ";
        }
    }

} else {
    header("Location: ../logmasuk.php?ralat=aksestidakdibenarkan");
}

?>