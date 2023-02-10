<?php 

    require_once('../core/petugas.php');
    $petugas = new Petugas();
    $id_petugas = $_GET['id_petugas'];
    $petugas->hapuspetugas($id_petugas);

?>