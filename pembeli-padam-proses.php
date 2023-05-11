<?php
session_start();
if(!empty($_GET))
{
    include('connection.php');
    $arahan = 'delete from pembeli where nokp_pembeli='.$_GET['nokp'];
    if(mysqli_query($condb,$arahan))
    {
        echo "<script>alert('Padam data Berjaya'); window.location.href='senarai-pembeli.php';</script>";
    }
    else
    {
        echo "<script>alert('Padam data Gagal'); window.location.href='senarai-pembeli.php';</script>";
    }
}
else
{
    die("<script>alert('Ralat! akses secara terus'); window.location.href='senarai-pembeli.php';</script>");
}
?>