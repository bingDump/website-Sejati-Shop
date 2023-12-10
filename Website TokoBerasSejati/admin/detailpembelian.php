<h3 class="mt-5 mb-3">Detail Pembelian</h3>
                <?php $ambil=$db->query("SELECT * FROM pembelian JOIN pelanggan
                ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'"); 
                $detail = $ambil->fetch_assoc();
                ?>
                <div class=" row ">
                    <div class=" col-md-3 col-12">
                        <h6>Pembelian</h6>
                        <p><strong>Id Pembelian : <?= $detail["id_pembelian"];?> </strong> <br>
                        <small>Tanggal : <?= $detail["tanggal_pembelian"];?> <br>
                        Total : Rp. <?= number_format($detail["total_pembelian"]);?> <br>
                        Status : <?= $detail["status_pembelian"];?></small></p>
                    </div>
                    <div class=" col-md-3 col-12 ">
                        <h6>Pelanggan</h6>
                        <p><strong> <?= $detail["nama_pelanggan"];?></strong> <br>
                        <small>No.telepon : <?= $detail["telpon_pelanggan"];?> <br>
                        Username : <?= $detail["username"];?></small></p>
                    </div>
                    <div class=" col-md-3 col-12">
                        <h6>Pengiriman</h6>
                        <p><strong><?= $detail["nama_kota"];?></strong> <br>
                        <small>Ongkos Kirim : Rp. <?=number_format( $detail["tarif"]);?> /item <br>
                        Alamat : <?= $detail["alamat_pengiriman"];?></small></p>
                    </div>
                    <div class=" col-md-3 col-12">
                        <h6>Catatan</h6>
                        <p><?= $detail["catatan"]; ?></p>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                        
                            <th>Nama Barang</th>
                        
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>jumlah</th>
                            <th>sub-Berat</th>
                            <th>sub-Total</th>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        <?php $ambil= $db->query("SELECT * FROM pembelian_produk WHERE id_pembelian ='$_GET[id]'");?>
                        <?php while($row = $ambil-> fetch_assoc()) {?>
                            <tr>
                                    <td><?= $i;?></td>
                                    
                                    <td><?= $row["nama"];?></td>
                                
                                    <td><?= number_format($row["berat"]);?> gr.</td>
                                    <td>Rp. <?= number_format($row["harga"]);?></td>
                                    <td><?= $row["jumlah"];?></td>
                                    <td><?= number_format($row["sub_berat"]);?> gr.</td>
                                    <td>Rp. <?= number_format($row["sub_harga"]);?></td>
                            
                            </tr>
                        <?php $i++; ?>
                        <?php }?>
                        </tbody>

                    </table>

                    
                    </div>