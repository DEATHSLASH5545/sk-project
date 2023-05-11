<?php
session_start();
include("header.php");
include('connection.php');
include('guard-staff.php');
if(empty($_GET)){
    die("<script>window.location.href='senarai-barang.php'</script>");
}
?>

<h3>kemaskini data borang</h3>

<form action="borang-kemaskini-proses.php?kod_barang_lama=<?= $_GET['kod_barang'] ?>" method='POST'>
    jenama barang : <?= $_GET ['jenama_barang'] ?><br>
    nama barang : <?= $_GET ['nama_barang'] ?><br>
    ciri : <?= $_GET ['ciri'] ?><br>
    harga <input type="text" name="harga" value="<?= $_GET['harga'] ?>" required><br>
    <input type="submit" value="Kemaskini">
</form>
<?php include('footer.php'); ?>