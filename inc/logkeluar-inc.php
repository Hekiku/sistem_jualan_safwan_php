<?php

session_start();
unset($_SESSION['idPengguna']);
unset($_SESSION['status']);
unset($_SESSION['banding']);

echo '
<script>
    alert("Anda berjaya log keluar. Terima kasih");
    window.location.href = "../index.php";
</script>
'

?>