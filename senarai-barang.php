<?php
session_start();
include('header.php');
include('guard-staff.php');
include('connection.php');

?>
<h3 >Senarai barang</h3>
<form  action='' method='POST'>

        <select name='jenama'>
            <option selected disabled>Sila pilih jenama</option>
            <?php
                $sql_jenama = "select * from jenama order by jenama_barang";
                $laksana_carian = mysqli_query($condb,$sql_jenama);
                while($n=mysqli_fetch_array($laksana_carian)){echo "<option value='".$m['jenama_barang']."'>".$m['jenama_barang']."</option>";
                }
            ?>
        </select> <input type='submit' value='Papar'>
</form>
|<a href='barang-daftar-borang.php'>Daftar Barang Baru</a>|
<?php include('butang-saiz.php'); ?>
<table class='table-border' id='saiz'>

<?php
$tambahan="";
if (!empty($_POST['jenama']))
{
    $tambahan= "and jenama.jenama_barang = '".$_POST['jenama']."'";
}
$arahan_papar="SELECT* FROM barang, jenama, staff
WHERE
      barang.kod_jenama = jenama.kod_jenama
and   barang.nokp_staff = staff.nokp_staff
      $tambahan
ORDER BY barang.kod_jenama DESC ";
$laksana = mysqli_query($condb,$arahan_papar);
if(mysqli_num_rows($laksana)<=0){
    echo "<br>Tiada data ditemui";
}
    while($m = mysqli_fetch_array($laksana))
    {
        $data_get=array(
            'nama_barang' => $m['nama_barang'],
            'jenama_barang' => $m['jenama_barang'],
            'harga' => $m['harga'],
            'ciri' => $m['ciri'],
            'gambar' => $m['gambar'],
            'kod_barang' => $m['kod_barang']
        
        );
echo " <tr>
       <td><img width='50%' src='img/".$m['gambar']."'></td>
       <td>
       <b> Jenama : ".$m['jenama_barang']." </b><br>
           Nama Telefon : ".$m['nama_barang']."<br>
           Spec : ".$m['ciri']."<br>
           Harga : RM ".$m['harga']."<br>
           Didaftar Oleh : ".$m['nama_staff'];
           echo "<br>
|<a href='barang-kemaskini-borang.php?" .http_build_query($data_get)."'>Kemaskini harga</a>
|<a href='barang-padam-proses.php?kod=".$m['kod_barang']."' onclick=\"return confirm('Anda pasti anda ingin memadam data ini.')\">Hapus</a>|

</td>

</tr>";
    }
?>
</table>
<?php include('footer.php'); ?>
