<?php
# memulakan fungsi session
session_start();

#memanggil fail header.php, connection.php dan guard-staff.php 
include('header.php');
include('connection.php');
include('guard-staff.php');
?>

<style>
    .kemaskini {
        border: none;
        box-shadow: none;
        padding: 10px;
        margin: 10px;
        border-radius: 15px;
        background-color: #008800;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .kemaskini:hover {
        background-color: #006600;
    }

    .hapus:hover {
        background-color: #660000;
    }

    .hapus {
        border: none;
        box-shadow: none;
        padding: 10px;
        margin: 10px;
        border-radius: 15px;
        background-color: #880000;
        color: white;
        text-align: center;
        cursor: pointer;
    }

</style>

<h3 >Senarai staff</h3>

| <a href='staff-signup-borang.php'>Daftar Staff Baru</a>
| <a href='staff-upload-borang.php'>Muat Naik Staff</a>
|
<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan --> 
<?php include('butang-saiz.php'); ?>
<!-- Header bagi jadual untuk memaparkan senarai staff --> 
<table width='100%' border='1' id='saiz'>
    <tr>
        <td>Nama</td>
        <td>Nokp</td>
        <td>Katalaluan</td>
        <td>Tindakan</td>
    </tr>

<?php

# arahan query untuk mencari senarai nama staff
$arahan_papar="select* from staff ";

# laksanakan arahan mencari data staff
$laksana = mysqli_query($condb,$arahan_papar);

# Mengambil data yang ditemui 
    while($m = mysqli_fetch_array($laksana))
    {
        # umpukkan data kepada tatasusunan bagi tujuan kemaskini staff
        $data_get=array(
            'nama'          => $m['nama_staff'],
            'nokp'          => $m['nokp_staff'],
            'katalaluan'    => $m['katalaluan_staff']
        );

        # memaparkan senarai nama dalam jadual 
        echo"<tr>
        <td>".$m['nama_staff']."</td>
        <td>".$m['nokp_staff']."</td>
        <td>".$m['katalaluan_staff']."</td>
        
        ";

        # memaparkan navigasi untuk kemaskini dan hapus data staff
        echo"<td>
        <button class='kemaskini' onclick=\"location.href='staff-kemaskini-borang.php?".http_build_query($data_get)."'\">Kemaskini</button>
        <button class='hapus' onclick=\"confirmFirst('Anda pasti anda ingin memadam data ini.', 'staff-padam-proses.php?nokp=".$m['nokp_staff']."');\">Hapus</button>
        
        
        </td>
        </tr>";
    }
    ?>
    </table>
    <script>
        function confirmFirst(question, redirect) {
            let res = confirm(question)
            if (res && redirect) {
                location.href = redirect
            }
        }
    </script>
    <?php include ('footer.php'); ?>