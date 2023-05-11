<?php
session_start();
if(!empty($_POST['nokp']) and !empty($_POST['katalaluan'])){
    include('connection.php');
    $query_login="SELECT * FROM pembeli WHERE nokp_pembeli='".$_POST['nokp']."' and 
    katalaluan_pembeli='".$_POST['katalaluan']."' Limit 1";
    $laksana_query=mysqli_query($condb,$query_login);
    if(mysqli_num_rows($laksana_query)==1){
        $m=mysqli_fetch_array($laksana_query);
        $_SESSION['tahap']='pembeli';
        echo "<script>window.location.href='index.php';</script>";
    }else{
        echo "<script>alert('login gagal'); window.location.href='pembeli-login-borang.php'</script>";
    }
}else{
    echo "<script>alert('sila masukkan nokp dan katalaluan'); window.location.href='pembeli-login-borang.php'</script>";
}
?>