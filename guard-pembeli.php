<?php
if($_SESSION['tahap'] != "pembeli")
{
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
?>