<h4 class="text-center dm"> Data Pembelian</h4>

<div class="btn-konten fixed-top">
    <form action="" method="POST">
        <div class="input-group">

            <div class="input-group-prepend">
                <button class="btn btn-sm btn-primary " type="submit" name="cari" id="button-addon1" ><i class="fa fa-search "></i></button>
            </div>

            <input class="form-check-inline form-control-sm p-1 " type="search" placeholder="pencarian" name="keyword" autocomplete="off" autofocus>
            
          
            
        </div>
    </form>
        
</div>
        <div class="isi-konten table-responsive">
            <table class="table table-bordered admin">
                <thead>
                    <th>No</th>
                    <th>Id_Pembelian</th>
                    <th>Nama_Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status Pembelian</th>
                    <th>aksi</th>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php ?>
                <?php
                    if(isset($_POST['cari'])){
                    
                        $keyword = $_POST["keyword"]; 
                        $ambil = $db->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE id_pembelian LIKE'%$keyword%' OR
                            nama_pelanggan LIKE'%$keyword%' OR
                            tanggal_pembelian LIKE'%$keyword%' OR
                            status_pembelian LIKE'%$keyword%' ORDER BY id_pembelian DESC");
                    
                        
                    }else{
                        $ambil=$db->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan ORDER BY id_pembelian DESC");
                    }


                ?>

                <?php while($row = $ambil->fetch_assoc()){?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["id_pembelian"];?></td>
                    <td><?= $row["nama_pelanggan"];?></td>
                    <td><?= $row["tanggal_pembelian"];?></td>
                    <td>Rp. <?= number_format($row["total_pembelian"]);?></td>
                    <td><?= $row["status_pembelian"];?></td>
                    <td><a href="index.php?halaman=detailpembelian&id=<?php echo $row['id_pembelian'] ?>" class="btn btn-sm btn-secondary mt-1" id="ubh"><i class="fa fa-eye"></i> <i class="fa fa-shopping-cart"></i></a> 
                   
                        <?php if ($row['status_pembelian']!=="pending"): ?>
                            <a href="index.php?halaman=pembayaran&id=<?php echo $row['id_pembelian'];  ?>" class="btn btn-sm btn-success mt-1" id="hps"><i class="fa fa-eye"></i> <i class="fa fa-money"></i> </a>
                        <?php endif ?>
                
                    </td>
                </tr>
                <?php $i++; ?>
                <?php } ?>
                </tbody>
            </table>
        </div>