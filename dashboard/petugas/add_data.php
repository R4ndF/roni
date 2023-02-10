<form action="../proses/proses_addpetugas.php" method="post">
<label for="username">Username</label>
<input type="text" name="username">
<br>
<label for="password">Password</label>
<input type="password" name="password">
<br>
<label for="nama_petugas">Nama Petugas</label>
<input type="text" name="nama_petugas">
<br>
<select name="level" >
    <option value="admin">Admin</option>
    <option value="petugas">Petugas</option>
</select>
<br>
<input type="submit" name="submit" value="Tambah data">
</form>