<?php 

    require_once('../core/siswa.php');
    $siswa = new Siswa();
    $nisn = $_GET['nisn'];
    $siswa->hapusSiswa($nisn);

?>