<?php
session_start();

include('header.php');
include('connection.php');
?>

<hr>
<h3>Tawaran Telefon Bimbit Termurah</h3>
<?php

$sql_pilihan = "SELECT * FROM barang, jenama
WHERE barang.kod_jenama = jenama.kod_jenama
group by barang.nama_barang
ORDER BY rand() limit 5 ";

$laksana_pilihan = mysqli_query($condb,$sql_pilihan);

if(mysqli_num_rows($laksana_pilihan)==0){
    echo "Tiada barangan yang telah direkodkan";
}
else{
    echo"<hr>";
    echo"<table border='1'>";

    while($n=mysqli_fetch_array($laksana_pilihan)){
echo " <tr>
          <td><img width='50%' src='img/".$n['gambar']."'></td>
          <td>
             <b> ".$n['jenama_barang']." </b><br>
                 ".$n['nama_barang']." <br>
                 ".$n['ciri']." <br>
                 RM ".$n['harga']."
            </td>
        </tr>";
        }
        echo"</table>";
    }
?>
<?php include ('footer.php'); ?>
