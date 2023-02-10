<table class="w3-table">
    <thead>
    
        <tr class="w3-black w3-text-white">
            <td>No</td>
            <td>ID Petugas</td>
            <td>Username</td>
            <td>Password</td>
            <td>Nama_Petugas</td>
            <td>Level</td>
            <td><a href="?url=addpetugas" class="w3-button w3-center">Tambah Data </a></td>
        </tr>
    </thead>
    <tbody class="w3-white">
        <?= $petugas->tampilpetugas();?>
    </tbody>
</table>
