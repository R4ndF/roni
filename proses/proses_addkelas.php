<?php
require_once('../core/kelas.php');
$kelas = new Kelas();
if(isset($_POST['submit'])){
    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $kelas->tambahKelas($nama_kelas, $jurusan);
}
?>