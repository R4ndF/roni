<?php
require_once('koneksi.php');
class Kelas{
    private $id_kelas;
    private $nama_kelas;
    private $jurusan;
    public $kq;
    public $koneksi;
    public function __construct(){
        $kon = new Koneksi();
        $this->koneksi = $kon->kon;
        $this->kq = mysqli_query($this->koneksi, "SELECT * FROM kelas");
    }
    
    public function tambahKelas($nama_kelas,$jurusan){
        $query = mysqli_query($this->koneksi, "SELECT * FROM kelas where nama_kelas = '$nama_kelas'");
        $result = mysqli_fetch_array($query);
        if($result['nama_kelas'] == $nama_kelas && $result['jurusan'] == $jurusan){
            session_start(); 
            $_SESSION['msg'] = "Data Kelas sudah ada !!!";
            header("Location:../dashboard?url=addkelas");
        }else{
            $this->nama_kelas = $nama_kelas;
            $this->jurusan = $jurusan;
            mysqli_query($this->koneksi,"INSERT INTO kelas(nama_kelas,jurusan) VALUES ('$this->nama_kelas','$this->jurusan')");
            session_start();
            $_SESSION['msg'] = "Data kelas telah ditambahkan";
            header("Location: ../dashboard?url=kelas");
    }
}
    public function tampilkelas(){

        
        $no = 1;
        while($result = mysqli_fetch_array($this->kq)){
            $this->id_kelas = $result['id_kelas'];
            $this->nama_kelas = $result['nama_kelas'];
            $this->jurusan = $result['jurusan'];

            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $this->id_kelas . "</td>";
            echo "<td>" . $this->nama_kelas . "</td>";
            echo "<td>" . $this->jurusan . "</td>";
            echo "<td>";

            ?>
            <a href="../dashboard?url=editkelas&id_kelas=<?= $this->id_kelas?>">Edit Kelas</a> | <a href="../proses/proses_hapus_siswa.php?id_kelas=<?= $this->id_kelas?>">Hapus Kelas</a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
    }
    public function editKelas($id_kelas,$nama_kelas, $jurusan){
        $query = mysqli_query($this->koneksi,"SELECT * FROM kelas WHERE nama_kelas = '$nama_kelas' AND jurusan = '$jurusan' ");
        $result = mysqli_fetch_array($query);
        if($result['nama_kelas'] == $nama_kelas && $result['jurusan'] == $jurusan){
            session_start();
            $_SESSION['msg'] = "Data kelas sudah ada !!!";
            header("Location: ../dashboard?url=kelas");
        }else{
            $this->id_kelas = $id_kelas;
            $this->nama_kelas = $nama_kelas;
            $this->jurusan = $jurusan;
            mysqli_query($this->koneksi,"UPDATE kelas SET nama_kelas = '$this->nama_kelas',jurusan = '$this->jurusan' WHERE id_kelas = '$this->id_kelas' ");
            session_start();
            $_SESSION['msg'] = "Data kelas berhasil di ubah";
            header("Location: ../dashboard?url=kelas");
        }
    }
        public function hapusKelas($id_kelas){
            $this->id_kelas = $id_kelas;
            mysqli_query($this->koneksi, "DELETE FROM kelas WHERE id_kelas = '$this->id_kelas'");
            session_start();
            $_SESSION['msg'] = "Kelas berhasil di hapus !!!";
            header("Location: ../dashboard/?url=kelas");
        }
    }
?>