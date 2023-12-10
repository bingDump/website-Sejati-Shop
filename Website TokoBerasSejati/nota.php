<?php
session_start();
//koneksi database
include 'koneksi.php';



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="warna.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome/css/fontt-awesome.min.css"> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <title>nota pembelian</title>
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
        <?php include 'menuside.php'; ?>
        <!-- end sidebar -->

        <!-- Content -->
        <main class="layout_content">

            <div class="barang container mr-0 ">

                <h3 class="mt-5 pt-3 mb-3 ">Nota Pembelian</h3>
                <?php $ambil=$db->query("SELECT * FROM pembelian JOIN pelanggan
                ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'"); 
                $detail = $ambil->fetch_assoc();
                ?>
               

                <!-- jika pembeli dan yg login tidak sama  //keamanan -->
                <?php  
                $id_pelangganbeli = $detail["id_pelanggan"];

                $Id_pelangganlogin = $_SESSION["pelanggan"]["id_pelanggan"];

                
                if($id_pelangganbeli !== $Id_pelangganlogin){

                    echo "<script> alert('Anda tidak bisa Melakukan itu'); </script>";
                    echo "<script> location='riwayatbeli.php'; </script>";
                    exit();
                }
                
                ?>


                <div class=" row ">
                    <div class=" col-md-3 col-12">
                        <h6>Pembelian</h6>
                        <p style="font-size:15px" ><strong>Id Pembelian : <?= $detail["id_pembelian"];?> </strong> <br>
                        <small>Tanggal : <?= $detail["tanggal_pembelian"];?> <br>
                        Total : Rp. <?= number_format($detail["total_pembelian"]);?> <br>
                        Status : <?= $detail["status_pembelian"];?></small></p>
                    </div>
                    <div class=" col-md-3 col-12 ">
                        <h6>Pelanggan</h6>
                        <p style="font-size:15px"><strong> <?= $detail["nama_pelanggan"];?></strong> <br>
                        <small>No.telepon : <?= $detail["telpon_pelanggan"];?> <br>
                        Username : <?= $detail["username"];?></small></p>
                    </div>
                    <div class=" col-md-3 col-12">
                        <h6>Pengiriman  </h6>
                        <p style="font-size:15px"><strong><?= $detail["nama_kota"];?>&nbsp;|&nbsp;Resi:<?= $detail["resi_pengiriman"];  ?> </strong> <br>
                        <small>Ongkir : Rp.<?=number_format( $detail["tarif"]);?>/Item kemasan <br>
                        Alamat : <?= $detail["alamat_pengiriman"];?></small></p>
                    </div>
                    <div class=" col-md-3 col-12">
                        <h6>Catatan</h6>
                        <p style="font-size:15px"><small><?= $detail["catatan"]; ?></small></p>
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
                 
                    <div class="row">
                        <div class="col-md-7 col-12">
                            <div class="alert alert-success">
                            
                                <p>Silahkan melakukan pembayaran pada menu <strong>riwayat belanja</strong>  sebesar Rp. <?= number_format($detail["total_pembelian"]);?> ke : </p>

                                <strong><p> BANK MANDIRI 1200005777292 AN. ANIK SABAR WATI</p></strong>
                            
                            
                            </div> 
                        
                        
                        </div>
                    
                    </div>

                    


            </div>

           <!-- footer  -->
           <?php include 'footer.php'; ?>
            <!-- endfooter -->
        </main>


    </div>


    <script src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>

</body>

</html>