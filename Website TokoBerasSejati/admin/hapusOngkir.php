<?php 

// var_dump($_GET); die;

$ambil = $db->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$row = $ambil->fetch_assoc();

$db->query("DELETE FROM ongkir WHERE id_ongkir='$_GET[id]'");


echo "<script> alert('Data Terhapus ...'); </script>";
echo "<script> location='index.php?halaman=ongkir';</script>";
?>