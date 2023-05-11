<?php
if($_SESSION['tahap'] != "staff")
{
    die("<script>alert('sila login');
    window.location.href='logout.php';</script>");
}
?>