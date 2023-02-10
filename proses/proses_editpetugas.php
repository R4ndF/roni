<?php 
    require_once('../core/petugas.php');
    $petugas = new Petugas();
    if(isset($_POST['submit'])){
        $id_petugas = $_POST['id_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_petugas = $_POST['nama_petugas'];
        $level = $_POST['level'];
        $petugas->editpetugas($id_petugas,$username,$password,$nama_petugas, $level);
    }

?>