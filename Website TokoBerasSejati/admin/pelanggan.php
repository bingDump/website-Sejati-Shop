<h4 class="text-center dm">Data Pelanggan</h4>
<div class="btn-konten fixed-top ">
    
    <form action="" method="POST">
        <div class="input-group">

            <div class="input-group-prepend">
                <button class="btn btn-sm btn-primary " id="button-addon1" name="cari" ><i class="fa fa-search "></i></button>
            </div>

            <input class="form-check-inline form-control-sm p-1 " type="search" name="keyword" placeholder="pencarian" autocomplete="off" autofocus>

            <div class="input-group-append">
                <a href="index.php?halaman=tambahplg" class="btn btn-sm btn-primary ">+Tambah</a>
            </div>

        </div>
    </form>
</div>
        <div class="isi-konten table-responsive">
            <table class="table table-bordered admin" >
                <thead>
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>No.Handphone</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php  

                    if(isset($_POST['cari'])){
                    
                        $keyword = $_POST["keyword"]; 
                            $ambil = $db->query("SELECT * FROM pelanggan WHERE 
                                                nama_pelanggan LIKE '%$keyword%' OR 
                                                id_pelanggan LIKE '%$keyword%' OR
                                                username LIKE '%$keyword%' OR 
                                                alamat LIKE '%$keyword%' OR
                                                telpon_pelanggan LIKE '%$keyword%' ORDER BY id_pelanggan DESC");
                        
                        
                    }else{
                        $ambil=$db->query("SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
                    }


                ?>
				<?php while($row = $ambil-> fetch_assoc()){?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["id_pelanggan"];?></td>
                    <td><?= $row["nama_pelanggan"];?></td>
                    <td><?= $row["username"];?></td>
                    <td><?= $row["alamat"];?></td>
                    <td><?= $row["telpon_pelanggan"];?></td>
                    <td><a href="index.php?halaman=ubahplg&id=<?php echo $row["id_pelanggan"];?>" id="ubh" class="btn btn-sm btn-primary" ><i class="fa fa-pencil-square-o"></i></a> <br><br> <a href="index.php?halaman=hapusplg&id=<?php echo $row["id_pelanggan"];?>" id="hps" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus ?');"><i class="fa fa-trash-o"></i></a></td>
                </tr>
                    <?php $i++; ?>
                <?php } ?>
                </tbody>
            </table>
        </div>