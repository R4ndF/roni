<?php
 $id_kelas = $_GET["id_kelas"];
$query = mysqli_query($kon->kon, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
$rkelas = mysqli_fetch_array($query);
?>
<form action="../proses/proses_editkelas.php" method="post">
    <input type="hidden" name="id_kelas" value="<?= $rkelas['id_kelas']?>">
    <label for="nama_kelas">Nama Kelas</label>
    <input type="text" name="nama_kelas" value="<?= $rkelas['nama_kelas']?>">
    <br>
    <label for="jurusan">Jurusan</label>
    <input type="text" name="jurusan" value="<?= $rkelas['jurusan']?>">
    <br>
    <input type="submit" value="Edit Data" name="submit">
</form>