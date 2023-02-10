<?php 
    require_once('../core/siswa.php');
    $siswa = new Siswa();
    if(isset($_POST['submit'])){
        $nisn = $_POST['nisn'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $id_kelas = $_POST['id_kelas'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $id_spp = $_POST['id_spp'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $siswa->tambahSiswa($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp , $id_spp,$username,$password);
    }
?>