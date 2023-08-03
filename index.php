<?php
# Memulakan fungsi session
session_start();

# Memanggil fail header.php dan fail connection.php
include('header.php');
include('connection.php');
?>

<style>
    .main-content {
        margin: auto;
        width: 70%;
    }

    .container {
        width: 50%;
        height: auto;
        display: inline-block;
    }

    #ad1, #ad2 {
        width: 100%;
        display: inline-block;
        transition: all 2s ease-in;
    }

    .animated {
        animation: fadeIn 2s;
    }

    @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
    }

</style>
<h3>Tawaran Telefon Bimbit Termurah</h3>

<div class="container">
    <div id="ad1">
        <img id="mainImg" src="img/advert1.png">
    </div>
</div>


<?php
    # arahan SQL untuk memaparkan secara rawak
    # 10 barangan yang ada dalam pangkalan data
    $sql_pilihan = "
    SELECT* FROM barang, jenama 
    WHERE barang.kod_jenama = jenama.kod_jenama
    group by barang.nama_barang
    ORDER BY rand() limit 5 ";

    # melaksanakan arahan sql_pilihan 
    $laksana_pilihan = mysqli_query($condb,$sql_pilihan);

    # jika tiada data yang dijumpai
    if(mysqli_num_rows($laksana_pilihan)==0){
          
       # papar Tiada barangan yang telah direkodkan 
       echo "Tiada barangan yang telah direkodkan";
    }
    else{
        echo"<hr>";
        # jika terdapat barangan yang ditemui 
        # papar dalam bentuk jadual.
        echo "<table border='1' class='main-content'>";

        # Pembolehubah $n mengambil data yang ditemui
        while($n=mysqli_fetch_array($laksana_pilihan)){

# memaparkan semula data diambil oleh pembolehubah $n
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

<script>
    let current = "ad1"
    setInterval(() => {
        document.querySelector(".container").classList.add("animated")
        let newImg = current === "ad1" ? "advert2" : "advert1"
        let mainImg = document.querySelector("#mainImg")
        mainImg.src = `img/${newImg}.png`
        current = current === "ad1" ? "ad2" : "ad1"
        setTimeout(() => { document.querySelector(".container").classList.remove("animated") }, 2000)
    }, 5000)
</script>
<?php include ('footer.php'); ?>