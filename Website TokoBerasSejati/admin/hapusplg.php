<?php 

// var_dump($_GET); die;

$ambil = $db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$row = $ambil->fetch_assoc();

$db->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[id]'");


echo "<script> alert('Data Terhapus ...'); </script>";
echo "<script> location='index.php?halaman=pelanggan';</script>";
?>