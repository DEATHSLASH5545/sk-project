<style>
    .table-border {
        border: 1px solid black;
    }
</style>

<h1>Phone to you</h1>
<p>Pilih Phone anda disini. tapi nanti belilah di kedai kami</p>
<hr>
<?php
if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "staff") {
    echo "
    | <a href='index.php'>Laman Utama</a>
    | <a href='senarai-pembeli.php'>Senarai pembeli</a>
    | <a href='senarai-staff.php'>Senarai staff</a>
    | <a href='senarai-barang.php'>Senarai barang</a>
    | <a href='logout.php'>Logout</a>
    | <hr>";
} else if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "pembeli") {
    echo "
    | <a href='index.php'>Laman Utama</a>
    | <a href='pembeli-pilih.php'>Perbandingan barang</a>
    | <a href='logout.php'>Logout</a>
    | <hr>";
} else {
    echo "
    | <a href='index.php'>Laman Utama</a>
    | <a href='pembeli-signup-borang.php'>Pengunna Baru</a>
    | <a href='pembeli-login-borang.php'>Login Pengguna</a>
    | <a href='staff-login-borang.php'>Login Staff</a>
    | <hr>";
}

?>