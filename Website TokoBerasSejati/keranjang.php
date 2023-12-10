<?php

session_start();

//Koneksi database
include 'koneksi.php';

//jika keranjang kosong
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script> alert('Keranjang Kosong, Silahkan Pilih Produk dulu');</script>";

    echo "<script>location='index.php';</script>";
}
// echo "<pre>"; print_r($_SESSION["keranjang"]); echo "</pre>";
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
                <div class="keranjang  pt-4">
                    <h4 class="mb-3 dm"> <i class="fa fa-shopping-cart"></i> Keranjang</h4>
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
                                <th>Aksi</th>
                            </tr>
                            <?php $i=1; ?>
                            <?php foreach ($_SESSION['keranjang'] as $id_barang => $jumlah ): ?>
                                                        
                            <?php $ambil = $db->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                            
                            $row =$ambil->fetch_assoc();

                            
                            $subharga = $row['harga_barang']*$jumlah;
                                         

                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo strtoupper($row['nama_barang']); ?></td>
                                <td><?php echo $row['kategori']; ?></td>                                
                                <td><?php echo number_format($row['berat_barang']); ?> gr</td>
                                <td><?php echo $jumlah; ?> <?php if($row['kategori']=="Kemasan"): ?> Buah <?php else : ?> Kg <?php endif ?></td>
                                <td>Rp. <?php echo number_format($row['harga_barang']); ?></td>
                                <td>Rp. <?php echo number_format($subharga); ?></td>
                                <td><a href="hapuskeranjang.php?id=<?php echo $id_barang ?>" class="btn btn-sm btn-danger " onclick="return confirm('Yakin ingin menghapus ?');"     ><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach ?>
                        </table>

                    </div>
                    <a href="index.php" class="btn btn-sm btn-primary w-100" > <i class="fa fa-shopping-cart"></i>&nbsp; Lanjut Belanja</a> 
                    <a href="checkout.php" class="btn btn-sm btn-success w-100 mt-2"> <i class="fa fa-credit-card"></i>&nbsp; Checkout</a>
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