<h4 class="text-center dm">Data Barang</h4>
<div class="btn-konten fixed-top w-100  ">
    <form action="" method="POST">
        <div class="input-group">

            <div class="input-group-prepend">
                <button class="btn btn-sm btn-primary " type="submit" name="cari" id="button-addon1" ><i class="fa fa-search "></i></button>
            </div>

            <input class="form-check-inline form-control-sm p-1 " type="search" placeholder="pencarian" name="keyword" autocomplete="off" autofocus>
            
            <div class="input-group-append">
                <a href="index.php?halaman=tambahbrg" class="btn btn-sm btn-primary ">+Tambah</a>
            </div>
            
        </div>
    </form>
</div>
        <div class="isi-konten table-responsive">
            <table class="table table-bordered admin ">
                <thead>
                    <th>No</th>
                    <th>Nama_brg</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Stok</th>
                    <th>Jenis / Kategori</th>
                    <th>foto_brg</th>
                    <th>Aksi</th>
                </thead>
               
                <tbody>
                <?php $i = 1; ?>
                <?php ?>
                <?php

                if(isset($_POST['cari'])){
                   
                    $keyword = $_POST["keyword"]; 
                        $ambil = $db->query("SELECT * FROM barang WHERE 
                                            nama_barang LIKE '%$keyword%' OR 
                                            jenis LIKE '%$keyword%' OR
                                            kategori LIKE '%$keyword%' OR 
                                            harga_barang LIKE '%$keyword%' ORDER BY id_barang DESC");
                    
                    
                }else{
                    $ambil=$db->query("SELECT * FROM barang ORDER BY id_barang DESC");
                }
                
                
                ?>
				<?php while($row = $ambil->fetch_assoc()){?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row["nama_barang"];?></td>
                        <td>Rp.<?=  number_format($row["harga_barang"]);?></td>
                        <td><?= number_format($row["berat_barang"]);?> gr.</td>
                        <td><?= $row["stok"];?> <?php if($row["kategori"]=="Kemasan"):  ?> buah <?php else : ?> kg <?php endif ?></td>
                        <td><?= $row["jenis"];?> | <?= $row["kategori"];?> </td>
                        <td><img src="../img/produk/<?= $row["foto_barang"]?>" width="50" alt=""></td>
                        <td><a href="index.php?halaman=ubahbrg&id=<?php echo $row["id_barang"];?>" id="ubh" class="btn btn-sm btn-primary mt-1" ><i class="fa fa-pencil-square-o"></i></a>     <a href="index.php?halaman=hapusbrg&id=<?php echo $row["id_barang"];?>" id="hps" class="btn btn-sm btn-danger mt-1" onclick="return confirm('Yakin ingin menghapus ?');" ><i class="fa fa-trash-o"></i></a></td>
                    </tr> 
                <?php $i++; ?>
                <?php } ?>
                </tbody>
                
            </table>
        </div>