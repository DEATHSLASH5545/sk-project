<?php
session_start();
include('header.php');
include('guard-staff.php');
if(empty($_GET)) {
    die("<script>window.location.href='senarai-staff.php';</script>");
}
?>
<h3>kemaskini staff Baru</h3>
<form action='staff-kemaskini-proses.php?nokp_lama=<?= $_GET['nokp'] ?>' method='POST'>
nama
<input type='text' name='nama' value='<?= $_GET['nama'] ?>' required><br>
nokp
<input type='text' name='nokp' value='<?= $_GET['nokp'] ?>' required><br>
katalaluan
<input type='text' name='katalaluan' value='<?= $_GET['katalaluan'] ?>' required><br>

<input type='submit' value='Kemaskini'>
</form>
<?php include ('footer.php'); ?>