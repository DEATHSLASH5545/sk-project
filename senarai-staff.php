<?php
session_start();
include('header.php');
include('connection.php');
include('guard-staff.php');
?>
<h3 >Senarai staff</h3>
| <a href='staff-signup-borang.php'>Daftar Staff Baru</a>
| <a href='staff-upload-borang.php'>Muat Naik Staff</a>
|
<?php include('butang-saiz.php'); ?>
<table width='100%' border='1' id='saiz'>
    <tr>
        <td>Nama</td>
        <td>Nokp</td>
        <td>katalaluan</td>
        <td>Tindakan</td> 
    </tr>
<?php
$arahan_papar="select * from staff ";
$laksana = mysqli_query($condb,$arahan_papar);
    while($m = mysqli_fetch_array($laksana))
    {
        $data_get=array(
            'nama' => $m['nnma_staff'],
            'nokp' => $m['nokp_staff'],
            'katalaluan' => $m['katalaluan_staff']
        );
        echo"<tr>
        <td>".$m['nama_pembeli']."</td>
        <td>".$m['nokp_pembeli']."</td>
        <td>".$m['katalaluan_pembeli']."</td> ";
        
        echo"<td>
        |<a href='staff-kemaskini-borang.php?".http_build_query($data_get)."'>Kemaskini</a>
        
        |<a href='staff-padam-proses.php?nokp=".$m['npkp_staff']."' onclick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">Hapus</a>|

        </td>
        </tr>";
    }
?>
</table>
<?php include ('footer.php'); ?>