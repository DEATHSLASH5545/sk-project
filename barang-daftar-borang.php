<?php
session_start();
include('header.php');
include('connection.php');
include('guard-staff.php');
?>
<h3> Pendaftaran Barangan Baru </h3>
<form action = 'barang-daftar-proses.php' method = 'POST' enctype='multipart/form-data'>
    Nama Barang <input type ='text' name ='nama' required> <br>
    Jenama <select name='kod_jenama' required> <option selected disabled value=''>Sila pilih jenama</option>
<?php

$sql_jenama = "SELECT * FROM jenama ORDER BY jenama_barang";
$laksana_carian = mysqli_query($condb, $sql_jenama);

while ($m = mysqli_fetch_array($laksana_carian)) {
    echo "<option value='".$m["kod_jenama"]."'>".$m["kod_jenama"]."</option>";
}

?>

    </select>
    <a href='barang-jenama-borang.php'>[+] Jenama</a><br>
    Harga   <input type='text' name='harga' required><br>
    Ciri    <input type='text' name='ciri' required><br>
    Gambar  <input type='file' name='gambar' required><br>
    <input type="submit" value="Daftar">
</form>

<?php include("footer.php"); ?>

    