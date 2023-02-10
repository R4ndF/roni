<form action="../proses/proses_addsiswa.php" method="POST">
    <input type="text" name="nisn" placeholder="NISN" required>
    <input type="text" name="nis" placeholder="NIS" required>
    <input type="text" name="nama" placeholder="Nama">
    <select name="id_kelas">
    <?php 
        while ($row = mysqli_fetch_array($kq)){
            ?>
                <option value="<?= $row['id_kelas'] ?>"> <?= $row['nama_kelas'] ?> | <?= $row['jurusan'] ?> </option>
            <?php
        }
    ?>    
    </select>
    <input type="text" name="alamat" placeholder="Alamat">
    <span>+62 </span><input type="text" name="no_telp" placeholder="8123-4567-891" pattern="[0-9]{4}-[0-9]{4}-[0-9]{3}">
    <select name="id_spp">
    <?php 
        while ( $row = mysqli_fetch_array($sq)){
            ?> 
                <option value="<?= $row['id_spp'] ?>"><?= $row['tahun'] ?> | <?= $row['nominal'] ?></option>
            <?php
        }
    ?>
    </select>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    
    <input type="submit" value="Tambah Data" name="submit">
</form>