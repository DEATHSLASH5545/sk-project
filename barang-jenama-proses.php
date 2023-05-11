<?php
session_start();
if(!empty($_POST))
{
    include('connection.php');
    $sql_simpan="INSERT INTO jenama (kod_jenama,jenama_barang VALUES (
        '".$_POST['kod_jenama']."','".$_POST['jenama_barang']."')";
        $laksana_query= mysqli_query($condb,$sql_simpan);
        if($laksana_query){
            die("<script>alert('pendaftaran berjaya'); window.history.href='barang-daftar-borang.php';</script>");
        }else{
            die ("<script>alert('pendaftaran gagal'); window.history.back();</script>");
        }
}else{
    die("<script>alert('sila lengkapkan maklumat'); window.history.href='barang-jenama-borang.php';</script>");
}
?>