<?php
session_start();
include('guard-staff');
if(!empty($_POST)){
    include('connection.php');
    if($_POST['harga']<=0){
        die('<script>alert("ralat makluamat"); window.history.back();</script>');
    }
    $arahan="UPDATE barang SET harga='".$_POST['harga']."', nokp_staff='".$_SESSION['nokp']."' WHERE kod_barang='".$_GET['kod_barang_lama']."'";
    if(mysqli_query($condb,$arahan)){
        echo "<script>alert('kemaskini berjaya'); window.location.href='senarai-barang.php';</script>";
    }
    else{
        echo "<script>alert('kemaskini gagal'); window.history.back();</script>";
    }
    
}else {
    die("<script>alert('sila lengkapkan maklumat'); window.location.href='senarai-barang.php';</script>");
}
?>