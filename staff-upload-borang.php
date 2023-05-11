<?php
session_start();
include('header.php');
include('guard-staff.php');
?>
<h3>Muat Naik Data Staff (*.txt)</h3>
<form action='staff-upload-proses.php' method='POST' enctype='multipart/form-data'>
    <h3><b>Sial Pilih txt Yang Ingin Diupload</b></h3>
    <input type='file'  name='data_staff'>
    <button type='submit'  name='btn-upload'>Muat Naik</button>
</form>
<?php include ('footer.php');  ?>