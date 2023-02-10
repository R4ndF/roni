<?php
require_once('../core/spp.php');
$spp = new Spp();
if (isset($_POST['submit'])){
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $spp->tambahspp($tahun, $nominal);
}
?>