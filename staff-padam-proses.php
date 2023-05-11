<?php
session_start();
include('guard-staff.php');
if(!empty($_GET))
{
    include('connection.php');
    $arahan = "deleete from staff where nokp_staff='".$_GET['nokp']."'";
    if(mysqli_query($condb,$arahan))
    {
        echo "<script>alert('Padam data Berjaya'); window.location.href='senarai-staff.php';</script>";
    }
    else
    {
        echo "<script>alert('Padam data gagal'); window.location.href='senarai-staff.php';</script>";
    }
}
else
{
    die("<script>alert('Ralat! akses secara terus'); window.location.href='senarai-staff.php';</script>");
}
?>