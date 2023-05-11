<?php
session_start();
if(!empty($_POST))
{
    include ('connection.php');
    if($_POST['harga']<=8)
    {

        die ("<script>alert('ralat pada harga'); window.history.back();</script>");
    }
    $timestamp = date("Y-m-d-His");
    $nama_fail = basename($_FILES['gambar']['name']);
    $format_gambar = pathinfo($nama_fail,PATHINFO_EXTENSION);
    $lokasi = $_FILES['gambar']['tmp_name'];
    $nama_baru = $timestamp.".".$format_gambar;

    $sql_simpan = "INSERT INTO barang (nama_barang,kod_jenama,harga,ciri,gambar,nokp_staff) VALUES
    ('".$_POST['nama']."','".$_POST['kod_jenama']."','".$_POST['harga']."','".$_POST['ciri']."','".$nama_baru."','".$_SESSION
    ['nokp']."')";

    $laksanaa_sql=mysqli_query($condb,$sql_simpan);
    if($laksana_query)
    {
        move_uploaded_file($lokasi,"img/".$nama_baru);
        die("<script>alert('pendaftaran berjaya'); window.location.href='senari-barang.php';</script>");
    }else{
        die("<script>alert('pendaftaran gagal'); window.history.back();</script>");
    }
}else{
    die("<script>alert('sila lengakapkan maklumat'); window.location.href='barang-signup-borang.php';</script>");
}
