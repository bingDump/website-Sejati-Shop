<h4 class="text-center dm">Ubah Pelanggan</h4>
<?php
$ambil = $db->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$row = $ambil->fetch_assoc();

// echo "<pre>";

// print_r($row);
// echo "</pre>";

?>

<form action="" method="POST">
    <div class="row">
            <div class="col-md-6 col-12">
    
                <div class="form-group">
                    <label for="nama_pelanggan">Nama Pelanggan</label>
                    <input class="form-control" type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukan Nama Pelanggan"
                    value="<?php echo $row['nama_pelanggan']; ?>"   required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" id="username" name="username" placeholder="Masukan Username" value="<?php echo $row['username']; ?>" required>
                    
                </div>
                
                <div class="form-group">
                    <label for="no_handphone">No.Handphone</label>
                    <input class="form-control" type="number" id="no_handphone" name="no_handphone" placeholder="Masukan Nomor Handphone" value="<?php echo $row['telpon_pelanggan']; ?>">
                    
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" cols="100" rows="3" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" ><?php echo $row['alamat']; ?></textarea>
                    
                </div>

                <div class="form-group">
                    
                    <button class="btn btn-sm btn-primary" type="submit" name="submit"> Ubah Pelanggan</button>
                </div>
            </div>
    </div>

</form>

<?php
if (isset($_POST['submit'])){

    

    $namaplg = htmlspecialchars($_POST["nama_pelanggan"]);
    $usrname = htmlspecialchars($_POST["username"]);
    $no_telp = htmlspecialchars($_POST["no_handphone"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
   
    $db->query("UPDATE pelanggan SET 
                    nama_pelanggan = '$namaplg',
                    username = '$usrname',
                    telpon_pelanggan = '$no_telp',
                    alamat = '$alamat'
                    WHERE id_pelanggan = '$_GET[id]'
                    ");
    
    
    
    echo "<script>alert('Data Telah Diubah')</script>";
    echo "<meta http-equiv ='refresh' content='1;url=index.php?halaman=pelanggan'>";

}
?>