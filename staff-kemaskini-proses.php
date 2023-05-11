<?php
session_start();
include('guard-staff.php');
if(!empty($_POST))
{
    include('connection.php');
    if(strlen($_POST['nokp']) != 12 or  !is_numeric($_POST['nokp']))
    {
        die("<script>alert('Ralat Nokp'); window.history.back();</script>");
    }
    $arahan = "update staff set
    nama_staff = '".$_POST['nama']."',
    nokp_staff = '".$_POST['nokp']."',
    katalaluan_staff = '".$_POST['katalaluan']."'
    where
    nokp_staff =  '".$_POST['nokp_lama']."' ";
    if(mysqli_query($condb,$arahan))
    {
        echo "<script>alert('Kemaskini Berjaya'); window.location.href='senarai-staff.php';</script>";
    }
    else
    {
        echo "<script>alert('Kemaskini Gagal'); window.history.back();</script>";
    }
}
else
{
    die("<script>alert('sila lengkapkan data'); window.location.href='senarai-staff.php';</script>");
}
?>