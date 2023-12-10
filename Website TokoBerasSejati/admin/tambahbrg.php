<h4 class="text-center dm">Tambah Barang</h4>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control form-control-sm" placeholder="Masukan Nama Barang" required>
            </div>
            <div class="form-group">
                <label for="harga_barang">Harga</label>
                <input type="number" id="harga_barang" name="harga_barang" class="form-control form-control-sm" placeholder="Masukan Harga Barang" required>
                
            </div>
            <div class="form-group">
                <label for="berat_barang">Berat (gr)</label>
                <input type="number" id="berat_barang" name="berat_barang" class="form-control form-control-sm" placeholder="Masukan Berat Barang">
            </div>
            <div class="form-group">
                <label for="jenis_barang">Jenis<small class="text-danger">*Penting dipilih </small>   </label>
                <select name="jenis_barang" id="jenis_barang" class="form-control form-control-sm">
                <?php
                    $ambil = $db->query("SELECT * FROM jenis");
                    while($perjenis = $ambil->fetch_assoc()){
                ?>
                    <option value="<?php echo $perjenis["jenis"]; ?>"> <?php echo $perjenis["jenis"]; ?></option>
                
                <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-12">    
            <div class="form-group">
                    <label for="kategori">Kategori <small class="text-danger">*Penting dipilih </small></label>
                    <select name="kategori" id="kategori" class="form-control form-control-sm">
                    <?php
                        $ambil = $db->query("SELECT * FROM kategori");
                        while($perkategori = $ambil->fetch_assoc()){
                    ?>
                        <option value="<?php echo $perkategori["kategori"]; ?>"><?php echo $perkategori["kategori"]; ?></option>
                    
                        <?php } ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="stok_barang">Stok Barang</label>
                <input type="number" id="stok_barang" name="stok_barang" class="form-control form-control-sm" placeholder="Masukan Jumlah stok Barang">
            </div>
            <div class="form-group">
                <label for="info_barang">Info Barang</label>
                <textarea cols="100" rows="3" name="info_barang" id="info_barang" class="form-control form-control-sm" placeholder="Masukan informasi barang" ></textarea>
            </div>
            <div class="form-group">
                <label for="foto_barang">Foto Barang </label>
                <input type="file" id="foto" name="foto" class="form-control-file form-control-sm">
            </div>

            <button  name="submit" class="btn btn-sm btn-primary">+ Tambah Barang</button>
        </div>    
    
</form>
<?php
 if (isset($_POST['submit'])){
    
    // var_dump($_POST);
    // var_dump($_FILES);
    // die;
   
    $foto = $_FILES['foto']['name'];
    $lokasi= $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi,"../img/produk/".$foto);

    $namabrg = htmlspecialchars($_POST["nama_barang"]);
    $hargabrg = htmlspecialchars($_POST["harga_barang"]);
    $beratbrg = htmlspecialchars($_POST["berat_barang"]);
    $jenisbrg = htmlspecialchars($_POST["jenis_barang"]);
    $stokbrg = htmlspecialchars($_POST["stok_barang"]);
    $infobrg = htmlspecialchars($_POST["info_barang"]);
    $kategori = htmlspecialchars($_POST["kategori"]);

    $db->query("INSERT INTO barang (nama_barang,harga_barang,berat_barang,foto_barang,jenis,kategori,stok,info_barang)
                VALUES
                -- ('$_POST[nama_barang]',
                -- '$_POST[harga_barang]',
                -- '$_POST[berat_barang]', 
                -- '$foto',
                -- '$_POST[jenis_barang]',
                -- '$_POST[stok_barang]')
                ('$namabrg','$hargabrg','$beratbrg','$foto','$jenisbrg','$kategori','$stokbrg','$infobrg')"
                );
 


    echo "<script> alert('Data tersimpan ..');</script>";
    echo "<meta http-equiv ='refresh' content='1;url=index.php?halaman=barang'>";
}

?>