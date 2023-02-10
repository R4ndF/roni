<?php
 $id_petugas = $_GET["id_petugas"];
$query = mysqli_query($kon->kon, "SELECT * FROM petugas WHERE id_petugas = '$id_petugas'");
$rpetugas = mysqli_fetch_array($query);
?>
<form action="../proses/proses_editpetugas.php" method="post">
    <input type="hidden" name="id_petugas" value="<?= $rpetugas['id_petugas']?>">
    <label for="username">Username</label>
    <input type="text" name="username" value="<?= $rpetugas['username']?>">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" value="<?= $rpetugas['password']?>">
    <br>
    <label for="nama_petugas">Nama_Petugas</label>
    <input type="text" name="nama_petugas" value="<?= $rpetugas['nama_petugas']?>">
    <br>
    <select name="level" >
        <option value="<?= $rpetugas['admin'] ?>">Admin</option>
        <option value="<?= $rpetugas['petugas']?>">Petugas</option>
    </select>
    <input type="submit" value="Edit Data" name="submit">
</form>