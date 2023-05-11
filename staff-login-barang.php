<?php
session_start();
include('header.php')
?>
<h3>Login staff</h3>
<form action='staff-login-proses.php' method='POST'>
    Nokp staff <input type='text' name='nokp'><br>
    katalaluan <input type='password' name='katalaluan'><br>
               <input type='submit' value='Login'>
</form>
<?php include  ('footer.php'); ?>