<?php 

    require_once('../core/spp.php');
    $spp = new Spp();
    $id_spp = $_GET['id_spp'];
    $spp->hapusspp($id_spp);

?>