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
    <link rel="stylesheet" href="fontawesome/css/fontt-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <title>toko beras sejati</title>
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
       <?php include 'menuside.php'; ?>
       <!-- endsidebar -->

        <!-- Content -->
        <main class="layout_content">

            <div class="barang container mr-0 ">
                <div class="jumbotron justify-content-between text-center">

                    <h2>Menjual Berbagai jenis beras Kemasan</h2>
                    <p>Beras FRESH langsung dari penggilingan setempat
                    <span class="text-warning">COCOK UNTUK KEBUTUHAN BULANAN</span></p>

                </div>
                <div class="row ">

                <?php $ambil = $db->query("SELECT * FROM barang"); ?>
                <?php while($barang =$ambil->fetch_assoc()){ ?>
                    
                    <div class="col-6 col-md-3 mt-3">
                        <div class="card shadow-sm">
                            <img src="img/produk/<?php echo $barang['foto_barang']; ?>" class="card-img-top " alt="">
                            <div class="card-body">

                                <h6 style="height:30px;" class="card-title"><?php echo strtoupper($barang['nama_barang']); ?> </h6>
                                <h4 class="card-text"> Rp. <?php echo number_format($barang['harga_barang']); ?></h4>
                                <p class="card-text">
                                <?php echo $barang['jenis']; ?> | <?php echo $barang['kategori']; ?>
                                </p>
                                <!-- <a href="beli.php?id=<?php echo $barang['id_barang']; ?>" class="btn btn-sm mt-2 ">Beli</a> -->
                                <a href="detail.php?id=<?php echo $barang['id_barang']; ?>" class="btn btn-sm btn-info mt-2 ">Beli</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>


                </div>
            </div>

            <!-- footer  -->
            <?php include 'footer.php'; ?>
            <!-- endfooter -->
        </main>
        <!-- end content -->


    </div>


    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>

</body>

</html>