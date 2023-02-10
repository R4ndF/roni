<table class="w3-table">
    <thead>
        <tr class="w3-black">
            <td>No</td>
            <td>NISN</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Kelas</td>
            <td>Alamat</td>
            <td>No telp</td>
            <td>SPP</td>
            <td>Aksi</td>
            <td>Username</td>
            <td><a href="?url=addsiswa" class="w3-button w3-center">Tambah Data </a></td>
        </tr>
    </thead>
    <tbody class="w3-white">
        <?= $siswa->tampilSiswa() ?>
    </tbody>
</table>