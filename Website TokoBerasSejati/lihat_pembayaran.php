<?php
session_start();

include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $db->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_Pembelian='$id_pembelian'");
$detailbayar = $ambil->fetch_assoc();

// echo "<pre>"; print_r($detailbayar); echo "</pre>";

//jika belum ada pembayaran'
if(empty($detailbayar)){
    echo "<script> alert('Belum ada pembayaran');</script>";
    echo "<script>location='riwayatbeli.php';</script>";
    exit();
}
//jika data pelangan tidak sama dengan yg login
if($_SESSION["pelanggan"]{"id_pelanggan"}!==$detailbayar["id_pelanggan"])
{
    echo "<script> alert('Anda Tidak bisa Melakukan ini !');</script>";
    echo "<script>location='riwayatbeli.php';</script>";
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

    <title>lihat pembayaran</title>
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
        <?php include 'menuside.php'; ?>
        <!-- end sidebar -->

        <!-- Content -->
        <main class="layout_content">

            <div class="barang container mr-0 ">
               
                <h3 class="mt-5 mb-3">Pembayaran</h3>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td><?php echo $detailbayar["nama"];  ?></td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td><?php echo $detailbayar["bank"];  ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?php echo $detailbayar["tanggal"];  ?></td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>Rp. <?php echo number_format($detailbayar["jumlah"]);  ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 col-12">
                        <img class="w-75 h-75" src="img/fotobuktibayar/<?php echo $detailbayar["bukti_pembayaran"];  ?>" alt="foto bukti pembayaran" class="img img-responsive w-100 h-auto">
                    </div>
                </div>




            </div>

            <!-- footer -->
            <?php include 'footer.php'; ?>
            <!-- end footer -->
        </main>


    </div>


    <script src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>

</body>

</html>