<?php
 $id_spp = $_GET["id_spp"];
$query = mysqli_query($kon->kon, "SELECT * FROM spp WHERE id_spp = '$id_spp'");
$rspp = mysqli_fetch_array($query);
?>
<form action="../proses/proses_editspp.php" method="post">
    <input type="hidden" name="id_spp" value="<?= $rspp['id_spp']?>">
    <label for="tahun">Tahun</label>
    <input type="text" name="tahun" value="<?= $rspp['tahun']?>">
    <br>
    <label for="nominal">Nominal</label>
    <input type="text" name="nominal" value="<?= $rspp['nominal']?>">
    <br>
    <input type="submit" value="Edit Data" name="submit">
</form>