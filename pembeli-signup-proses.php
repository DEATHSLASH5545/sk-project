<?php
session_start();
include('guard-staff.php');
if(!empty($_POST)){
    include('connection.php');
    if(strlen($_POST['nokp'])!=12 or !is_numeric($_POST['nokp'])){
        die("<script>alert('ralat pada no kad pengenalan'); window.location.href='pembeli-signup-borang.php';</script>");
    }
    $sql_simpan="INSERT INTO pembeli (nama_pembeli,nokp_pembeli,katalaluan_pembeli) VALUES ('".$_POST['nama'].",'
    '".$_POST['nokp']."','".$_POST['katalaluan']."')";
    $laksana_query=mysqli_query($condb,$sql_simpan);
    if($laksana_query){
        echo "<script>alert('pendaftaran berjaya'); window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('pendaftaran gagal'); window.location.href='pembeli-signup-borang.php';</script>";
    }
}else{
    echo"<script>alert('sila lengkapkan maklumat'); window.location.href='pembeli-signup-borang.php';</script>";
}
?>