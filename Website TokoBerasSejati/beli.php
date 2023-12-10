<?php
session_start();

$id_barang = $_GET['id'];


//jika barang sudah ada dikranjang maka jumlah +1
if(isset($_SESSION['keranjang'][$id_barang])){

    $_SESSION['keranjang'][$id_barang]+=1;
}
else{
    $_SESSION['keranjang'][$id_barang]=1;

}

// echo "<pre>"; print_r($_SESSION); echo "</pre>";
echo "<script>alert('Telah ditambahkan ke keranjang');</script>";
echo "<Script>location='keranjang.php';</script>";
?>