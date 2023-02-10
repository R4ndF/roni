<?php 
    require_once('../core/kelas.php');
    $kelas = new Kelas();
    if(isset($_POST['submit'])){
        $id_kelas = $_POST['id_kelas'];
        $nama_kelas = $_POST['nama_kelas'];
        $jurusan = $_POST['jurusan'];
        $kelas->editKelas($id_kelas,$nama_kelas, $jurusan);
    }

?>