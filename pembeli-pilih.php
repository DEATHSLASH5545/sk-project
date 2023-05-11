<?php
session_start();
include('header.php');
include('connection.php');
include('guard-pembeli.php');
?>

<p>carian telefon bimbit</p>
<form action="" method="post">
    <table>
        <tr>
            <td>julat harga</td>
            <td><input type="text" name="harga"><i>done</i></td>
        </tr>
        <tr>
            <td>jenama</td>
            <td>
                <select name="jenama">
                    <option selected disabled>sila pilih jenama</option>
                    <?php
                    $sql_jenama="SELECT * FROM jenama ORDER BY jenama_barang";
                    $laksana_carian=mysqli_query($comdb,$sql_jenama);
                    while($m=mysqli_fetch_array($laksana_carian)){
                        echo "<option value = '".$m['jenama_barang']."'>".$m['jenama_barang']."</option>";
                    }
                    ?>
                </select>
                <i>dan</i>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="cari"></td>
        </tr>
    </table>
</form>
<hr>
<?php
if(!empty($_POST['jenama'])or !empty($_POST['harga'])){
    $tambahan=" ";
    $carian=" ";
    if(!empty($_POST['harga'])){
        $tambahan=$tambahan." "." AND barang.harga <= ".$_POST['harga']."";
        $carian=$carian."harga : RM ".$_POST['harga']." ke bawah <br>";
    }
    if(!empty($_POST['jenama'])){
        $tambahan=$tambahan." "." AND jenama.jenama_barang <= ".$_POST['jenama']."";
        $carian=$carian."jenama : RM ".$_POST['jenama']." <br>";
    }
    echo "carian mengikut <br>".$carian;
    $sql_pilihan="SELECT * FROM barang,jenama WHERE barang.kod_jenama=jenama.kod_jenama $tambahan 
    GROUP BY barang.nama_barang ORDER BY barang.harga";
    $laksana_pilihan=mysqli_query($condb,$sql_pilihan);
    if(mysqli_num_rows($laksana_pilihan)==0){
        echo "carian tidak ditemui";
    }else{
        echo "<hr>";
        include('butang-saiz.php');
        echo "<table border='1' id='saiz'>";
        while($n=mysqli_fetch_array($laksana_pilihan)){
            echo "<tr>
            <td><img width='50%' src='img/".$n['gambar']."</td>
            <td>
            <b>".$n['jenama_barang']."</b><br>
            ".$n['nama_barang']."<br>
            ".$n['ciri']."<br>
            RM ".$n['harga']."
            </td>
            </tr>";
        }
        echo "</table>";
    }
}else{
    echo "sila masukkan maklumat carian";
}
include('footer.php');
?>