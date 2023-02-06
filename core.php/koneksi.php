<?php 
    class Koneksi {
        public $kon;
        private $username;
        private $password;

        function __construct()
        {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $this->kon = mysqli_connect("localhost", "root", "") or die("Couldn't connect to MySQL server");
        mysqli_select_db($this->kon, "db_spp");
        }

        public function login($username,$password){
            $query = mysqli_query($this->kon, "SELECT * FROM siswa CROSS JOIN petugas WHERE username = '$username' AND password ='$password'");
            $row = mysqli_fetch_array($query);
            if ($row['username'] == $username AND $row['password'] == $password){
                if($row['level'] == 'admin'){
                    session_start();
                    $_SESSION['id_petugas'] = $row['id_petugas'];
                    $_SESSION['username'] = $row['username'];                    
                    $_SESSION['level'] = $row['level'];
                    header("Location: ../dashboard");
                }elseif($row['level'] == 'petugas'){
                    session_start();
                    $_SESSION['id_petugas'] = $row['id_petugas'];
                    $_SESSION['username'] = $row['username'];                    
                    $_SESSION['level'] = $row['level'];
                    header("Location: ../dashboard");
                }else{
                    session_start();
                    $_SESSION['nisn'] = $row['nisn'];
                    $_SESSION['username'] = $row['username'];                    
                    header("Location: ../dashboard");
                }
            }else{
                session_start();
                $_SESSION['msg'] = 'Username or password is invalid !!';
                header("Location: ../index.php");
            }
        }
    }
?>