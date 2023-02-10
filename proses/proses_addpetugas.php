<?php
require_once('../core/petugas.php');
$petugas = new Petugas();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];
    $petugas->tambahpetugas($username,$password,$nama_petugas, $level);
}
?>