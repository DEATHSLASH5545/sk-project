<?php
# memulakan fungsi session
session_start();

# memanggil fail header, guard-staff, connection
include('header.php');
include('guard-staff.php');
include('connection.php');

?>
<style>
    .image {
        display: flex;
        justify-content: center;
        position: relative;
        border: none;
    }

    img {
        height:fit-content;
        display: block;
        border: none;
    }

    table {
        border: 1px solid black;
        width: 80%;
        margin: auto;
        margin-bottom: 20px;
    }

    .designer {
        border: none;
        border-collapse: collapse;
        margin: none;
        display: flex;
        justify-content: center;;
    }

    .row-name {
        text-align: right;
        width: auto;
        margin-right: 0;
    }

    .row-value {
        text-align: left;
    }
    
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

    .selectist {
        padding: 5px;
        border-radius: 10px;
        border-color: gray;
    }

</style>
<h3 >Senarai barang</h3>
<!-- Bahagian 1 : memaparkan borang untuk memilih jenama --> 
<form action='' method='POST'>

        <select name='jenama' class="selectist" id="jenama">
            <option selected disabled> Sila pilih jenama</option>
            <?php
                $sql_jenama = "select * from jenama order by jenama_barang";
                $laksana_carian = mysqli_query($condb,$sql_jenama);
                while ($m=mysqli_fetch_array($laksana_carian)){
echo "<option value='".$m['jenama_barang']."'>".$m['jenama_barang']."</option>";
                }
            ?>
        </select>

    </select>

</form>
<button class="btn" onclick="location.href = 'barang-daftar-borang.php'">Daftar Barang Baru</button>


<!-- Memanggil fail butang-saiz bagi membolehkan pengguna mengubah saiz tulisan -->
<?php include('butang-saiz.php'); ?>

<!-- Header bagi jadual untuk memaparkan senarai barang -->
<table border='1' id='saiz'>

<?php

# syarat tambahan yang akan dimasukkan dalam arahan(query) senarai barang
$tambahan="";
if(!empty($_POST['jenama']))
{
    $tambahan= "and jenama.jenama_barang = '".$_POST['jenama']."'";
}

# arahan query untuk mencari senarai nama barang dan susun menaik mengikut harga
$arahan_papar="SELECT* FROM barang, jenama, staff
WHERE
     barang.kod_jenama = jenama.kod_jenama
and  barang.nokp_staff = staff.nokp_staff
     $tambahan
ORDER BY barang.kod_barang DESC ";

# laksanakan arahan mencari data barang
$laksana = mysqli_query($condb,$arahan_papar);

if(mysqli_num_rows($laksana)<=0){
    echo "<br>Tiada data ditemui";
}

# Mengambil data yang ditemui
    while($m = mysqli_fetch_array($laksana))
    {
        # umpukkan data kepada tatasusunan bagi tujuan kemaskini barang
        $data_get=array(
            'nama_barang'       =>  $m['nama_barang'],
            'jenama_barang'     =>  $m['jenama_barang'],
            'harga'             =>  $m['harga'],
            'ciri'              =>  $m['ciri'],
            'gambar'            =>  $m['gambar'],
            'kod_barang'        =>  $m['kod_barang']

        );

# memaparkan senarai nama dalam jadual
echo "  <tr>
        <td class=\"image\"><img width='50%' src='img/".$m['gambar']."'></td>
        <td style='width: 50%;'>
        
        <table class=\"designer\">
            <tr>
                <td class=\"row-name\"><b>Jenama :</b></td>
                <td class=\"row-value\"><b>".$m['jenama_barang']."</b></td>
                
            </tr>
            <tr>
                <td class=\"row-name\">Nama Barang :</td>
                <td class=\"row-value\">".$m['nama_barang']."</td>
            </tr>
            <tr>
                <td class=\"row-name\">Spec :</td>
                <td class=\"row-value\">".$m['ciri']."</td>
            </tr>
            <tr>
                <td class=\"row-name\">Didafter oleh :</td>
                <td class=\"row-value\">".$m['nama_staff']."</td>
            </tr>
            <tr>
                <td class=\"row-name\">Jenama :</td>
                <td class=\"row-value\">".$m['nama_staff']."</td>
            </tr>
        </table>";
            

            # memaparkan navigasi untuk kemaskini dan hapus data barang
            echo "<br>

            <button class='kemaskini' onclick=\"location.href='barang-kemaskini-borang.php?".http_build_query($data_get)."'\">Kemaskini</button>
            <button class='hapus' onclick=\"confirmFirst('Anda pasti anda ingin memadam data ini.', 'barang-padam-proses.php?kod=".$m['kod_barang']."');\">Hapus</button>
        
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

    document.querySelector("#jenama").addEventListener("change", (e) => {
        document.forms[0].submit()
    })
</script>
<?php include ('footer.php'); ?>