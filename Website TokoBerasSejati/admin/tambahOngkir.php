<h4 class="text-center dm">Tambah Ongkos Kirim</h3>

<form action="" method="POST">
    
        <div class="form-group">
            <label for="kota">Nama Kota</label>
            <input class="form-control" type="text" id="kota" name="nama_kota" placeholder="Masukan Nama Kota" required>
        </div>
        <div class="form-group">
            <label for="tarif">Tarif</label>
            <input class="form-control" type="number" id="tarif" name="tarif" placeholder="Masukan Tarif" required>
        </div>
        <div class="form-group">
            
            <button class="btn btn-sm btn-primary"  name="submit">+ Tambah Ongkir</button>
        </div>


</form>
<?php
 if (isset($_POST['submit'])){

    $namakota = htmlspecialchars($_POST["nama_kota"]);
    $tarif = htmlspecialchars($_POST["tarif"]);

    $db->query("INSERT INTO ongkir (nama_kota,tarif)
            VALUES ('$namakota',$tarif)");


    echo "<script> alert('Data Disimpan ...'); </script>";
    echo "<meta http-equiv ='refresh' content='1;url=index.php?halaman=ongkir'>";
 }

 ?>