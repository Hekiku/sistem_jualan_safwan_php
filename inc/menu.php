<?php

if (isset($_SESSION['status'])) {
    if($_SESSION['status'] == "pengguna"){
        echo'
        <li id="page1"><a href="index.php">HALAMAN UTAMA</a></li>
        <li id="page2"><a href="senarai_produk.php">SENARAI JERSI</a></li>
        <li id="page4"><a href="senarai_banding.html">SENARAI BANDING</a></li>
        <li id="page5"><a href="senarai_pilihan.php">SENARAI PILIHAN</a></li>
        <li id="page6"><a href="profil.php">PROFIL</a></li>
        <li id="page7"><a href="inc/logkeluar-inc.php">LOG KELUAR</a></li>
        ';
    } else if($_SESSION['status'] == "admin"){
        echo'
        <li id="page1"><a href="index.php">HALAMAN UTAMA</a></li>
        <li id="page2"><a href="senarai_produk.php">SENARAI JERSI</a></li>
        <li id="page8"><a href="tambah_produk.php">TAMBAH PRODUK</a></li>
        <li id="page9"><a href="senarai_pilihan_pengguna.php">PILIHAN PENGGUNA</a></li>
        <li id="page7"><a href="inc/logkeluar-inc.php">LOG KELUAR</a></li>
        ';
    }
} else {
    echo '
    <li id="page1"><a href="index.php">HALAMAN UTAMA</a></li>
    <li id="page2"><a href="senarai_produk.php">SENARAI JERSI</a></li>
    <li id="page3"><a href="logmasuk.php">LOG MASUK</a></li>
    ';
}

?>