<!DOCTYPE html>
<html>
    <head>
        <title>HANDPHONE_MOBILE_SYSTEM</title>
        <style>

            *{
                margin: 0;
            }
            body{
                background: linear-gradient(180deg, white, #23A1FF);
                background-attachment: fixed;
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin:0;
                padding:0;
            }

            nav {
                display: flex;
                justify-content: center;
                
            }

            header{
                margin: none;
                top: 0;
                /*background-color: #56D4FF;*/
                color: black;
                text-align:center;
            }
            footer{
                background-color: palegoldenrod;
                color: black;
                text-align:center;
                padding: 10px;
                /*align-content: flex-end;*/
                display: block;
                position:bottom;
                bottom: 0;
                left: 0;
                width: 100%;
            }

            article{
                padding: 8px;
                text-align: center;
            }

            h3{
                color: black;
            }

            table{
                /*background-color: lightyellow;*/
                width: 100%;
                border-collapse: collapse;
                border: 3px ridge blue;
            }

            td{
                padding: 10px;
            }
            tr:hover{
                background-color:mediumaquamarine;
            }

            .btn {
                cursor: pointer;
                border: none;
                box-shadow: none;
                border-radius: 10px;
                padding: 8px;
                margin: 5px;
                background-color: white;
            }

            .btn:hover {
                background-color: #CCCCCC;
            }

        </style>
    </head>
    <body>
<header>
<!-- tajuk sistem. Akan dipaparkan disebelah atas -->
<h1>HANDPHONE MOBILE SYSTEM SDN.BHD.</h1>
<p>Pilih Phone anda disini. tapi nanti belilah di kedai kami</p>
</header>



<nav>
<!-- Bahagian Menu Asas.
    Menu terbahagi kepada 3 jenis iaitu
     1. Menu staff dimana staff dapat akses semua perkara
     2. Menu pembeli dimana pembeli hanya boleh memilih 
       barangan tetapi pembeli perlu login dahulu.
     3. Menu di laman utama - bagi pelawat yang tidak login 
       pelawat tidak dapat memilih  barangan
-->
<?PHP
# Menu staff : dipaparkan sekiranya staff telah login
if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "staff")
{
    echo "
    <button class=\"btn\" onclick=\"location.href='index.php'\">Laman Utama</button>
    <button class=\"btn\" onclick=\"location.href='senarai-pembeli.php'\">Senarai pembeli</button>
    <button class=\"btn\" onclick=\"location.href='senarai-staff.php'\">Senarai staff</button>
    <button class=\"btn\" onclick=\"location.href='senarai-barang.php'\">Senarai barang</button>
    <button class=\"btn\" onclick=\"location.href='logout.php'\">Logout</button>
    ";
}
# Menu pembeli : dipaparkan sekiranya pembeli telah login
else if(!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "pembeli")
{
    echo "
    <button class=\"btn\" onclick=\"location.href='index.php'\">Laman Utama</button>
    <button class=\"btn\" onclick=\"location.href='pembeli-pilih.php'\">Perbandingan barang</button>
    <button class=\"btn\" onclick=\"location.href='logout.php'\">Logout</button>
    ";

} else {

    #menu Laman Utama : dipaparkan sekiranya staff atau pembeli tidak login
    echo "
    <button class=\"btn\" onclick=\"location.href='index.php'\">Laman Utama</button>
    <button class=\"btn\" onclick=\"location.href='pembeli-signup-borang.php'\">Pengguna Baru</button>
    <button class=\"btn\" onclick=\"location.href='pembeli-login-borang.php'\">Login Pengguna</button>
    <button class=\"btn\" onclick=\"location.href='staff-login-borang.php'\">Login Staff</button>
    ";
}?>

</nav>
<article>


