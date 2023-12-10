<h3 class="text-center dm">Tambah Pelangan</h3>
<form action="" method="POST">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control" type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukan Nama Pelanggan"
                        required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Masukan Username" required>
                
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Masukan Password" required>
                
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="form-group">
                <label for="no_handphone">No.Handphone</label>
                <input class="form-control" type="number" id="no_handphone" name="no_handphone" placeholder="Masukan Nomor Handphone">
                
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" cols="100" rows="3" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap"></textarea>
                
            </div>

            <div class="form-group">
                
                <button class="btn btn-sm btn-primary" type="submit" name="submit">+ Tambah Pelanggan</button>
            </div>
        </div>
    </div>
    
</form>
<?php
if (isset($_POST['submit'])){
    
    $namaplg = htmlspecialchars($_POST["nama_pelanggan"]);
    $username = htmlspecialchars($_POST["username"]);
    $pass = htmlspecialchars($_POST["password"]);
    $telpon = htmlspecialchars($_POST["no_handphone"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    $db-> query("INSERT INTO pelanggan 
                (nama_pelanggan,username,password_plg,telpon_pelanggan,alamat)
        VALUES ('$namaplg','$username','$pass','$telpon','$alamat')"
        );

    
    echo "<script> alert('Data Ditambahkan ..'); </script>";
    echo "<meta http-equiv ='refresh' content='1;url=index.php?halaman=pelanggan'>";
}


?>
