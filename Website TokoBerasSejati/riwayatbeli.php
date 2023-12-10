<?php
session_start();

include 'koneksi.php';

//jika tidak ada login pnelanggan //keamana

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script> alert('Silahkan Login');</scropt>";
    echo "<script>location='loginuser.php';</scropt>";
    exit();
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

    <title>riwayat pembelian</title>
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
        <?php include 'menuside.php';   ?>
        <!-- end sidebar -->

        <!-- Content -->
        <main class="layout_content">

            <div class="barang container mr-0 ">
                <div class="keranjang">
                    
                
                    <h3 class="mt-5 pt-4 mb-3 heady">Riwayat Pembelian</h3>
                    <h4 class="mt-2 mb-3">Pelanggan : <?php echo $_SESSION["pelanggan"]['nama_pelanggan'];  ?><h4>
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <th>No</th>
                                <th>Id_pembelian</th>
                                <th>Tanggal</th>
                                <th>Alamat Pengiriman</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php
                                    $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

                                    $ambil = $db->query("SELECT * FROM pembelian WHERE id_Pelanggan='$id_pelanggan' ORDER BY id_pembelian DESC");
                                    
                                    $i = 1;
                                    while($row = $ambil->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row["id_pembelian"]; ?></td>
                                    <td><?php echo $row["tanggal_pembelian"]; ?></td>
                                    <td><?php echo $row["alamat_pengiriman"]; ?></td>
                                    <td><?php echo $row["status_pembelian"]; ?> <br> 
                                    <?php if(!empty($row["resi_pengiriman"])): ?>

                                        RESI : <?php echo $row["resi_pengiriman"]; ?> <br> 
                                    <?php endif  ?>
                                    </td>
                                    <td>Rp. <?php echo number_format($row["total_pembelian"]); ?></td>
                                    <td> <a href="nota.php?id=<?php echo $row["id_pembelian"];  ?>" class="btn btn-sm btn-secondary mt-2">Nota</a>

                                    <?php if($row["status_pembelian"]=="pending") :  ?>
                                     <a href="pembayaran.php?id=<?php echo $row["id_pembelian"];  ?>" class="btn btn-sm btn-success mt-2"><i class="fa fa-credit-card"></i></a>
                                    
                                    <?php elseif($row["status_pembelian"]=="Tidak Valid") :  ?>
                                     <a href="pembelian_invalid.php?id=<?php echo $row["id_pembelian"];  ?>" class="btn btn-sm btn-danger mt-2"><i class="fa fa-credit-card"></i></a>
                                    
                                    <?php else : ?>
                                        <a href="lihat_pembayaran.php?id=<?php echo $row["id_pembelian"]; ?>" class="btn btn-sm btn-info mt-2"> <i class="fa fa-info-circle"></i> <i class="fa fa-credit-card"></i></a>
                                    <?php endif ?>
                                    
                                    </td>

                                </tr>
                                    <?php $i++;  ?>

                                    <?php  }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- footer -->

            <?php include 'footer.php';  ?>
            <!-- end footer -->
        </main>


    </div>


    <script src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>

</body>

</html>