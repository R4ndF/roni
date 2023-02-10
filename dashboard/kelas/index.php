<table class="w3-table">
    <thead>
        <tr class="w3-black w3-text-white">
            <td>No</td>
            <td>ID Kelas</td>
            <td>Nama_Kelas</td>
            <td>Jurusan</td>
            <td><a href="?url=addkelas " class="w3-button w3-center">Tambah Data </a></td>
        </tr>
    </thead>
    <tbody class="w3-white">
        <?= $kelas->tampilkelas();?>
    </tbody>
</table>