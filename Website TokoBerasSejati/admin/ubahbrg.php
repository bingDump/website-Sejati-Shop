<h4 class="text-center dm">Ubah Barang</h4>
<?php
$ambil = $db->query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
$row = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($row);
// echo "</pre>";

?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control form-control-sm" placeholder="Masukan Nama Barang" value="<?php echo $row['nama_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga_barang">Harga </label>
                <input type="number" id="harga_barang" name="harga_barang" class="form-control form-control-sm" placeholder="Masukan Harga Barang" value="<?php echo $row['harga_barang']; ?>" required>
                
            </div>
            <div class="form-group">
                <label for="berat_barang">Berat (gr)</label>
                <input type="number" id="berat_barang" name="berat_barang" class="form-control form-control-sm" placeholder="Masukan Berat Barang"value="<?php echo $row['berat_barang']; ?>">
            </div>
            <div class="form-group">
                <label for="jenis_barang">Jenis <small class="text-danger">*Penting dipilih </small> </label>
                <select name="jenis_barang" class="form-control form-control-sm" id="jenis_barang"  value="<?php echo $row['jenis']; ?>"> >
                    <?php
                        $ambil = $db->query("SELECT * FROM jenis");
                        while($perjenis = $ambil->fetch_assoc()){
                    ?>
                        <option value="<?php echo $perjenis["jenis"]; ?>"> <?php echo $perjenis["jenis"]; ?></option>
                    
                        <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="foto_barang"> Ganti Foto Barang</label>
                <input type="file" id="foto_barang" class="form-control-file form-control-sm" name="foto_barang">
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="kategori">Kategori <small class="text-danger">*Penting dipilih </small></label>
                <select name="kategori" id="kategori" class="form-control form-control-sm" value="<?php echo $row['kategori']; ?>">
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
                <input type="number" id="stok_barang" name="stok_barang" placeholder="Masukan Jumlah stok Barang" class="form-control form-control-sm" value="<?php echo $row['stok']; ?>">
            </div>
            <div class="form-group">
                <label for="info_barang">Info Barang</label>
                <textarea cols="100" rows="2" name="info_barang" id="info_barang" class="form-control form-control-sm" placeholder="Masukan informasi barang" ><?php echo $row['info_barang']; ?></textarea>
            </div>
            <div class="form-group">
                Foto Barang Sebelumnya &nbsp;&nbsp;  
                <img src="../img/produk/<?php echo $row['foto_barang'] ?>" width="200px">
            
            </div>
            
            
        </div>
        <div class="col-12">
             <div class="form-group">
                
                <button class="btn btn-sm btn-primary"  name="submit"> Ubah Barang</button>
            </div>
        </div>
    </div>
</form>
<?php
if (isset($_POST['submit'])){

    $namaFoto=$_FILES['foto_barang']['name'];
    $lokasi =$_FILES['foto_barang']['tmp_name'];

    $namabrg = htmlspecialchars($_POST["nama_barang"]);
    $hargabrg = htmlspecialchars($_POST["harga_barang"]);
    $beratbrg = htmlspecialchars($_POST["berat_barang"]);
    $jenisbrg = htmlspecialchars($_POST["jenis_barang"]);
    $kategori = htmlspecialchars($_POST["kategori"]);
    $stokbrg = htmlspecialchars($_POST["stok_barang"]);
    $infobrg = htmlspecialchars($_POST["info_barang"]);
    
    //Cek foto ada atau
    if(!empty($lokasi)){
        move_uploaded_file($lokasi,"../img/produk/$namaFoto");

        $db->query("UPDATE barang SET 
                    nama_barang = '$namabrg',
                    harga_barang = '$hargabrg',
                    berat_barang = '$beratbrg',
                    jenis = '$jenisbrg',
                    kategori='$kategori',
                    stok = '$stokbrg',
                    foto_barang = '$namaFoto',
                    info_barang = '$infobrg'
                    WHERE id_barang = '$_GET[id]'
                    ");
    }else{
        $db->query("UPDATE barang SET 
                    nama_barang = '$namabrg',
                    harga_barang = '$hargabrg',
                    berat_barang = '$beratbrg',
                    jenis = '$jenisbrg',
                    kategori='$kategori',
                    stok = '$stokbrg',
                    info_barang = '$infobrg'
                    WHERE id_barang = '$_GET[id]'
                    ");
  
    }
    echo "<script>alert('Data Telah Diubah')</script>";
    echo "<meta http-equiv ='refresh' content='1;url=index.php?halaman=barang'>";

}
?>