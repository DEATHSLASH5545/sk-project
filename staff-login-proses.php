<?php
session_start();
if(!empty($_POST['nokp']) and !empty($_POST['katalaluan']))
{
    include ('connection.php');
    $query_login = "SELECT * FROM staff
    WHERE
            nokp_staff = '".$_POST['nokp']."'
    and     katalaluan_staff = '".$_POST['katalaluan']."' ";

    $laksana_query = mysqli_query($condb,$query_login);
    if(mysqli_num_rows($laksana_query)==1)
    {
        $m = mysqli_fetch_array($laksana_query);
        $_SESSSION['nokp'] = $m['nokp_staff'];
        $_SESSSION['tahap'] = "staff";
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        die("<script>alert('login Gagal'); window.location.href='staff-login-barang.php';</script>");
    }
}
else
{
    die("<script>alert('sila masukkan nokp dan katalaluan'); window.location.href='staff-login-barang.php';</script>");
}
?>