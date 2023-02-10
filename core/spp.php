<?php
require_once('koneksi.php');
class Spp{
    private $id_spp;
    private $tahun;
    private $nominal;
    public $sq;
    public $koneksi;
    public function __construct(){
        $kon = new Koneksi();
        $this->koneksi = $kon->kon;
        $this->sq = mysqli_query($this->koneksi, "SELECT * FROM spp");
        
    }
    
    public function tambahspp($tahun,$nominal){
        $query = mysqli_query($this->koneksi, "SELECT * FROM spp where tahun = $tahun AND nominal = $nominal");
        $result = mysqli_fetch_array($query);
        if($result['tahun'] == $tahun && $result['nominal'] == $nominal){
            session_start(); 
            $_SESSION['msg'] = "Data spp sudah ada !!!";
            header("Location:../dashboard?url=addspp");
        }else{
            $this->tahun = $tahun;
            $this->nominal = $nominal;
            mysqli_query($this->koneksi,"INSERT INTO spp(tahun,nominal) VALUES ('$this->tahun','$this->nominal')");
            session_start();
            $_SESSION['msg'] = "Data spp telah ditambahkan";
            header("Location: ../dashboard?url=spp");
    }
}
    public function tampilspp(){
        $no = 1;
        while($result = mysqli_fetch_array($this->sq)){
            $this->id_spp = $result['id_spp'];
            $this->tahun = $result['tahun'];
            $this->nominal = $result['nominal'];

            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $this->id_spp . "</td>";
            echo "<td>" . $this->tahun . "</td>";
            echo "<td>" . $this->nominal . "</td>";
            echo "<td>";

            ?>
            <a href="../dashboard?url=editspp&id_spp=<?= $this->id_spp?>">Edit spp</a> | <a href="../proses/proses_hapus_spp.php?id_spp=<?= $this->id_spp?>">Hapus spp</a>
            <?php
            echo "</td>";
            echo "</tr>";
        }
    }
    public function editspp($id_spp,$tahun, $nominal){
        $query = mysqli_query($this->koneksi,"SELECT * FROM spp WHERE tahun = '$tahun' AND nominal = '$nominal' ");
        $result = mysqli_fetch_array($query);
        if($result['tahun'] == $tahun && $result['nominal'] == $nominal){
            session_start();
            $_SESSION['msg'] = "Data spp sudah ada !!!";
            header("Location: ../dashboard?url=spp");
        }else{
            $this->id_spp = $id_spp;
            $this->tahun = $tahun;
            $this->nominal = $nominal;
            mysqli_query($this->koneksi,"UPDATE spp SET tahun = '$this->tahun',nominal = '$this->nominal' WHERE id_spp = '$this->id_spp' ");
            session_start();
            $_SESSION['msg'] = "Data spp berhasil di ubah";
            header("Location: ../dashboard?url=spp");
        }
    }
        public function hapusspp($id_spp){
            $this->id_spp = $id_spp;
            mysqli_query($this->koneksi, "DELETE FROM spp WHERE id_spp = '$this->id_spp'");
            session_start();
            $_SESSION['msg'] = "spp berhasil di hapus !!!";
            header("Location: ../dashboard/?url=spp");
        }
    }
?>