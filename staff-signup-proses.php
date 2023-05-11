<?php
session_start();
if(!empty($_POST))
{
    include ('connection.php');
    if(strlen($_POST['nokp']) != 12 or !is_numeric($_POST['nokp']))
    {
        die ("<script>alert ('Ralat Pada No Kad Pengenalan'); window.locaation.href='staff-signup-borang.php';</script>");
    }
    $sql_simpan = "INSERT INTO staff
    (nama_staff, nokp_staff, katalaluan_staff)
    VALUES
    ('".$_POST['nama']."', '".$_POST['nokp']."','".$_POST['katalaluan']."') ";
    $laksana_query = mysqli_query($condb,$sql_simpan);
    if($laksana_query)
    {
        echo "<script>alert('Pendaftaran Berjaya.'); window.location.href='senarai-staff.php';</script>";
    }
    else
    {
        echo "<script>alert('Pendaftaran Gagal'); window.location.href='senarai-staff.php';</script>";
    }
}
else
{
    echo "<script>alert('Sila lengakapkan maklumat'); window.location.href='senarai-staff.php';</script>";
}
?>