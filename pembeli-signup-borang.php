<?php
session_start();
include('header.php');
?>
<h3>pendaftaran pembeli baru</h3>

<form action="pembeli-signup-proses.php" method="POST">
    nama pembeli <input type="text" name="nama" required><br>
    nokp pembeli <input type="text" name="nokp" required><br>
    katalaluan <input type="password" name="katalaluan" required><br>
    <input type="submit" value="Daftar">
</form>
<?php include('footer.php'); ?>