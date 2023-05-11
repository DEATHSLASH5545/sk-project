<?php
session_start();
include('header.php');
?>
<h3>login pembeli</h3>
<form action="pembeli-login-proses.php" method="post">
    nokp pembeli = <input type="text" name="nokp" required>
    katalaluan = <input type="password" name="katalaluan" required>
    <input type="submit" value="Login">
</form>
<?php include('footer.php');?>