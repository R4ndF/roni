<?php
require_once('koneksi.php');
class Siswa{
    private $nisn;
    private $nis;
    private $nama;
    private $id_kelas;
    private $alamat;
    private $no_telp;
    private $id_spp;
    private $username;
    private $password;
    public $koneksi;
    public function __construct(){
        $kon = new Koneksi();
        $this->koneksi = $kon->kon;
    }
    
    public function tambahsiswa($nis,$nama,$id_kelas,$alamat,$no_telp,$id_spp,$username,$password){
        $query = mysqli_query($this->koneksi, "SELECT * FROM siswa where nis = '$nis' AND nama = '$nama' AND id_kelas = '$id_kelas' AND alamat = '$alamat' AND no_telp = '$no_telp' AND id_spp = '$id_spp' AND username = '$username' AND password = '$password'");
        $result = mysqli_fetch_array($query);
        if($result['nis'] == $nis && $result['nama'] == $nama && $result['id_kelas'] == $id_kelas && $result['alamat'] == $alamat && $result['no_telp'] == $no_telp && $result['id_spp'] == $id_spp && $result['username'] == $username && $result['password'] == $password){
            session_start(); 
            $_SESSION['msg'] = "Data siswa sudah ada !!!";
            header("Location:../dashboard?url=addsiswa");
        }else{
            $this->nis = $nis;
            $this->nama = $nama;
            $this->id_kelas = $id_kelas;
            $this->alamat = $alamat;
            $this->no_telp = $no_telp;
            $this->id_spp = $id_spp;
            $this->username = $username;
            $this->password = $password;
            mysqli_query($this->koneksi,"INSERT INTO siswa(nis,nama,id_kelas,alamat,no_telp,id_spp,username,password) VALUES ('$this->nis','$this->nama','$this->id_kelas','$this->alamat','$this->no_telp','$this->id_spp','$this->username','$this->password)");
            session_start();
            $_SESSION['msg'] = "Data siswa telah ditambahkan";
            header("Location: ../dashboard?url=siswa");
    }
}
    public function tampilsiswa(){
        $query = mysqli_query($this->koneksi, "SELECT * FROM siswa");
        $no = 1;
        while($result = mysqli_fetch_array($query)){
            $this->nisn = $result['nisn'];
            $this->nis = $result['nis'];
            $this->nama = $result['nama'];
            $this->id_kelas = $result['id_kelas'];
            $this->alamat = $result['alamat'];
            $this->no_telp = $result['no_telp'];
            $this->id_spp = $result['id_spp'];
            $this->username = $result['username'];
            $this->password = $result['password'];

            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $this->nisn . "</td>";
            echo "<td>" . $this->nis . "</td>";
            echo "<td>" . $this->nama . "</td>";
            echo "<td>" . $this->id_kelas . "</td>";
            echo "<td>" . $this->alamat . "</td>";
            echo "<td>" . $this->no_telp . "</td>";
            echo "<td>" . $this->id_spp  . "</td>";
            echo "<td>" . $this->username . "</td>";
            echo "<td>" . $this->password . "</td>";
            echo "<td>";

            ?>
            <a href="../dashboard?url=editsiswa&nisn=<?= $this->nisn?>">Edit siswa</a> | <a href="../proses/proses_hapus_siswa.php?nisn=<?= $this->nisn?>">Hapus siswa</a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
    }
    public function editsiswa($nisn,$nis, $nama,$id_kelas,$alamat,$no_telp,$id_spp,$username,$password){
        $query = mysqli_query($this->koneksi,"SELECT * FROM siswa WHERE nis = '$nis' AND nama = '$nama' AND id_kelas = '$id_kelas' AND alamat = '$alamat' AND no_telp = '$no_telp' AND id_spp = '$id_spp' AND username = '$username' AND password = '$password'");
        $result = mysqli_fetch_array($query);
        if($result['nis'] == $nis && $result['nama'] == $nama && $result['id_kelas'] == $id_kelas && $result['alamat'] == $alamat && $result['no_telp'] == $no_telp && $result['id_spp'] == $id_spp && $result['username'] == $username && $result['password'] == $password){
            session_start();
            $_SESSION['msg'] = "Data siswa sudah ada !!!";
            header("Location: ../dashboard?url=siswa");
        }else{
            $this->nisn = $nisn;
            $this->nis = $nis;
            $this->nama = $nama;
            $this->id_kelas = $id_kelas;
            $this->alamat = $alamat;
            $this->no_telp = $no_telp;
            $this->id_spp = $id_spp;
            $this->username = $username;
            $this->password = $password;
            mysqli_query($this->koneksi,"UPDATE siswa SET nis = '$this->nis',nama = '$this->nama', id_kelas = '$this->id_kelas', alamat = '$alamat', no_telp = '$no_telp', id_spp = '$id_spp', username = '$username', password = '$password' WHERE nisn = '$this->nisn' ");
            session_start();
            $_SESSION['msg'] = "Data siswa berhasil di ubah";
            header("Location: ../dashboard?url=siswa");
        }
    }
        public function hapussiswa($nisn){
            $this->nisn = $nisn;
            mysqli_query($this->koneksi, "DELETE FROM siswa WHERE nisn = '$this->nisn'");
            session_start();
            $_SESSION['msg'] = "siswa berhasil di hapus !!!";
            header("Location: ../dashboard/?url=siswa");
        }
    }
?>