<?php
session_start();
include('header.php');
include('guard-staff.php');
?>

<h3>pendaftaran jenama baru</h3>
<form action = 'barang-jenama-proses.php' method='POST'>
    kod jenama  <input type="text" name="kod_jenama" required ><br>
    jenama barang <input type="text" name="jenama_barang" required ><br>
    <input type="submit" value="Daftar">
</form>
<?php include('footer.php'); ?>