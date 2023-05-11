<?php
session_start();
include('header.php');
include('guard-staff.php');
?>
<h3> Pendaftaran staff baharu </h3>
<form action = 'staff-signup-proses.php' method = 'POST'>
    Nama staff <input type ='text' name ='nama' required> <br>
    Nokp staff <input type ='text' name ='nokp' required> <br>
    katalaluan <input type ='password' name ='katalaluan' required> <br>
               <input type ='submit' value ='Daftar'>
</form>
<?php include ('footer.php');?>