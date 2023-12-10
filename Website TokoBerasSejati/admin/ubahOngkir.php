<h4 class="text-center dm">Ubah Ongkir</h3>
<?php
$ambil = $db->query("SELECT * FROM ongkir WHERE id_ongkir='$_GET[id]'");
$row = $ambil->fetch_assoc();

// echo "<pre>";

// print_r($row);
// echo "</pre>";

?>

<form action="" method="POST">

        <div class="form-group">
            <label for="kota">Nama Kota</label>
            <input class="form-control" type="text" id="kota" name="nama_kota" placeholder="Masukan Nama Kota" value="<?php echo $row['nama_kota']; ?>" required>
        </div>
        <div class="form-group">
            <label for="tarif">Tarif</label>
            <input class="form-control" type="number" id="tarif" name="tarif" placeholder="Masukan Tarif" value="<?php echo $row['tarif']; ?>" required>
        </div>
        <div class="form-group">
            
            <button class="btn btn-sm btn-primary"  name="submit">+ Ubah Ongkir</button></td>
        </div>


</form>
<?php
 if (isset($_POST['submit'])){

    $namakota = htmlspecialchars($_POST["nama_kota"]);
    $tarif = htmlspecialchars($_POST["tarif"]);

    $db->query("UPDATE  ongkir SET nama_kota='$namakota',
                                tarif='$tarif'
                               WHERE id_ongkir='$_GET[id]' 
                               ");


    echo "<script> alert('Data Di Ubah ...'); </script>";
    echo "<meta http-equiv ='refresh' content='1;url=index.php?halaman=ongkir'>";
 }

 ?>