<?php
session_start();
//koneksi database
include 'koneksi.php';


//mengamankan  dari pelanggan yg belum login
if(!isset($_SESSION["pelanggan"]))
{
    echo "<script> alert('Silahkan Login dulu..');</script>";

    echo "<script>location='loginuser.php';</script>";
}
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script> alert('Keranjang Kosong, Silahkan Pilih Produk dulu');</script>";

    echo "<script>location='index.php';</script>";
}

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

    <title>toko beras sejati</title>
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
        <?php include 'menuside.php'; ?>
        <!-- end sidebar -->

        <!-- Content -->
        <main class="layout_content">

            <div class="barang container mr-0 ">
                
                <div class="chekout">
                    <h4 class=" mb-3 dm"><i class="fa fa-credit-card fa-lg"></i>  Checkout</h4>
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Ketergori</th>
                                <th>Berat</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>SubHarga</th>
                               
                            </tr>
                            <?php $i=1; ?>
                            <?php $totalbelanja= 0; ?>
                            <?php $totaljml= 0; ?>
                            <?php foreach($_SESSION['keranjang'] as $id_barang => $jumlah): ?>

                            <?php $ambil = $db->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                            
                            $row =$ambil->fetch_assoc();
                            $subharga = $row['harga_barang']*$jumlah;

                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['nama_barang']; ?></td>
                                <td><?php echo $row['kategori']; ?></td>                                
                                <td><?php echo number_format($row['berat_barang']); ?> gr</td>
                                <td><?php echo $jumlah; ?></td>
                                <td>Rp. <?php echo number_format($row['harga_barang']); ?></td>
                                <td>Rp. <?php echo number_format($subharga); ?></td>
                            </tr>
                            
                            <?php $i++; ?>
                                <?php if ($row["kategori"]=="Eceran"){
                                    $totaljml+=1;
                                }else{
                                    $totaljml+=$jumlah;
                                } 
                            ?>
                            <?php $totalbelanja+=$subharga; ?>
                            <?php endforeach ?>
                            <tfoot>

                                <tr>
                                    <td colspan="6" class="text-center"> <strong>Total</strong></td>
                                    <td> <strong>Rp. <?php echo number_format($totalbelanja); ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                   

                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                            <input class="form-control form-control-sm" type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>">
                                    
                                    </div>
                                    <div class="col-md-4 mt-2">
                                        
                                    <input class="form-control form-control-sm" type="text" readonly value="<?php echo $_SESSION["pelanggan"]["telpon_pelanggan"] ?>">
                                        
                                    </div>
                                    <div class="col-md-4 mt-2 mb-2">
                                        
                                            <select class="form-control form-control-sm" name="id_ongkir" id="id_ongkir">
                                                <option value="">pilih ongkos kirim</option>
                                                <?php
                                                $ambil = $db->query("SELECT * FROM ongkir");
                                                while($perOngkir = $ambil->fetch_assoc()){

                                                
                                                ?>
                                                <option value="<?php echo $perOngkir["id_ongkir"]; ?>">
                                                    <?php echo $perOngkir["nama_kota"]; ?>
                                                    
                                                     = Rp. <?php echo number_format($perOngkir["tarif"]); ?> / item
                                                </option>
                                                <?php }?>
                                            </select>
                                    </div>
                                </div>
                       
                            <div class="form-group mt-3">
                               
                                <textarea name="catatan" id="alamat" cols="30" rows="3"
                                    class="form-control form-control-sm" placeholder="Catatan Pelanggan" required></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="alamat">Alamat lengkap Pengiriman</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="3"
                                    class="form-control form-control-sm" placeholder="alamat pengiriman" required></textarea>
                            </div>
                            <button class="btn btn-sm btn-success ml-3 mb-3" name="checkout">Checkout</button>
                        </form>
                        <?php

                            if(isset($_POST["checkout"])){
                                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                                $id_ongkir = $_POST["id_ongkir"];
                                $tanggal_beli = date("Y-m-d");
                                $alamat = $_POST["alamat"];
                                $catatan = $_POST["catatan"];

                                $ambil = $db->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                                $arrOngkir = $ambil->fetch_assoc();
                                $tarif = $arrOngkir['tarif'];
                                $namakota = $arrOngkir['nama_kota'];

                                // $ambiljml = $db->query("SELECT * FROM pembelian_produk JOIN pembelian ON pembelian_produk.id_pembelian=pembelian.id_pembelian WHERE pembelian_produk.id_pembelian=''");

                                $totalongkir = $tarif * $totaljml;
                                
                                $total_beli = $totalbelanja + $totalongkir;


                                //input ke tabel pembelian
                                $db->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,tarif,total_tarif,alamat_pengiriman,catatan,nama_kota) 
                                                        VALUES('$id_pelanggan','$id_ongkir','$tanggal_beli','$total_beli','$tarif','$totalongkir','$alamat','$catatan','$namakota')
                                                        ");

                                //get id pembelian yang baru terjadi
                                $id_pembelian_terjadi = $db->insert_id;
                                foreach($_SESSION["keranjang"] as $id_barang => $jumlah){

                                    //mendapatkan data produk yg dibeli
                                    $ambil = $db->query("SELECT * FROM barang WHERE id_barang ='$id_barang'");
                                    $perbarang = $ambil->fetch_assoc();

                                    $nama = $perbarang['nama_barang'];
                                    $berat = $perbarang['berat_barang'];
                                    $harga = $perbarang['harga_barang'];
                                    $subberat = $perbarang['berat_barang'] * $jumlah;
                                    $subharga = $perbarang['harga_barang'] * $jumlah;

                                    $db->query("INSERT INTO pembelian_produk (id_pembelian,id_barang,nama,berat,harga,sub_berat,sub_harga,jumlah) VALUES ('$id_pembelian_terjadi','$id_barang','$nama','$berat','$harga','$subberat','$subharga','$jumlah')");
                                
                                    //update stok barang
                                    $db->query("UPDATE barang SET stok=stok-$jumlah WHERE id_barang='$id_barang'");
                                
                                }
                                //mengkosongkan keranjang
                                unset($_SESSION["keranjang"]);

                                // ke halaman nota dari pembelian yang terjadi
                                echo "<script>alert('Pembelian sukses');</script>";
                                echo "<script>location='nota.php?id=$id_pembelian_terjadi';</script>";
                            }

                        ?>
                    
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