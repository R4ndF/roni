<?php
require_once('koneksi.php');
class Petugas{
    private $id_petugas;
    private $username;
    private $password;
    private $nama_petugas;
    private $level;
    public $koneksi;
    public function __construct(){
        $kon = new Koneksi();
        $this->koneksi = $kon->kon;
    }
    
    public function tambahpetugas($username,$password,$nama_petugas,$level){
        $query = mysqli_query($this->koneksi, "SELECT * FROM petugas where username = '$username' ");
        $result = mysqli_fetch_array($query);
        if($result['username'] == $username){
            session_start(); 
            $_SESSION['msg'] = "Username petugas sudah ada !!!";
            header("Location:../dashboard?url=addpetugas");
        }else{
            $this->username = $username;
            $this->password = $password;
            $this->nama_petugas = $nama_petugas;
            $this->level = $level;
            mysqli_query($this->koneksi,"INSERT INTO petugas(username,password,nama_petugas,level) VALUES ('$this->username','$this->password','$this->nama_petugas','$this->level')");
            session_start();
            $_SESSION['msg'] = "Data petugas telah ditambahkan";
            header("Location: ../dashboard?url=petugas");
    }
}
    public function tampilpetugas(){
        $query = mysqli_query($this->koneksi, "SELECT * FROM petugas");
        $no = 1;
        while($result = mysqli_fetch_array($query)){
            $this->id_petugas = $result['id_petugas'];
            $this->username = $result['username'];
            $this->password = $result['password'];
            $this->nama_petugas = $result['nama_petugas'];
            $this->level = $result['level'];

            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $this->id_petugas . "</td>";
            echo "<td>" . $this->username . "</td>";
            echo "<td>" . $this->password . "</td>";
            echo "<td>" . $this->nama_petugas . "</td>";
            echo "<td>" . $this->level . "</td>";
            echo "<td>";

            ?>
            <a href="../dashboard?url=editpetugas&id_petugas=<?= $this->id_petugas?>">Edit petugas</a> | <a href="../proses/proses_hapus_siswa.php?id_petugas=<?= $this->id_petugas?>">Hapus petugas</a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
    }
    public function editpetugas($id_petugas,$username, $password, $nama_petugas, $level){
        $query = mysqli_query($this->koneksi,"SELECT * FROM petugas WHERE username = '$username' AND password = '$password' AND nama_petugas = '$nama_petugas' AND level = '$level'");
        $result = mysqli_fetch_array($query);
        if($result['username'] == $username && $result['password'] == $password && $result['nama_petugas'] == $nama_petugas && $result['level'] == $level){
            session_start();
            $_SESSION['msg'] = "Data petugas sudah ada !!!";
            header("Location: ../dashboard?url=petugas");
        }else{
            $this->id_petugas = $id_petugas;
            $this->username = $username;
            $this->password = $password;
            $this->nama_petugas = $nama_petugas;
            mysqli_query($this->koneksi,"UPDATE petugas SET username = '$this->username',password = '$this->password', nama_petugas = '$this->nama_petugas' level = '$this->level' WHERE id_petugas = '$this->id_petugas' ");
            session_start();
            $_SESSION['msg'] = "Data petugas berhasil di ubah";
            header("Location: ../dashboard?url=petugas");
        }
    }
        public function hapuspetugas($id_petugas){
            $this->id_petugas = $id_petugas;
            mysqli_query($this->koneksi, "DELETE FROM petugas WHERE id_petugas = '$this->id_petugas'");
            session_start();
            $_SESSION['msg'] = "petugas berhasil di hapus !!!";
            header("Location: ../dashboard/?url=petugas");
        }
    }
?>