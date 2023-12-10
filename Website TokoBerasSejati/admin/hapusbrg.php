<?php 
// $db = new mysqli("localhost","root","","tokosejati");

    // var_dump($_GET); die;
// function hapus($id){
//     global $db;

//     mysqli_query($db,"DELETE FROM barang WHERE id_barang = $id");

//     return mysqli_affected_rows($db);

// }


    $ambil = $db->query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
    $row = $ambil->fetch_assoc();
    $fotobarang = $row['foto_barang'];

    if(file_exists("../img/produk/$fotobarang")){

        unlink("../img/produk/$fotobarang");
    }else{
        echo "<script> alert('Tidak ada Foto / gambar'); </script>";
    }

    $db->query("DELETE FROM barang WHERE id_barang='$_GET[id]'");


    echo "<script> alert('Barang Terhapus'); </script>";
    echo "<script> location='index.php?halaman=barang';</script>";

?>