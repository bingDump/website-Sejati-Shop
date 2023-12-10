<?php

session_start();
//koneksi database
include 'koneksi.php';

$keyword = $_GET["keyword"];

$semua_data=array();
$ambil=$db->query("SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%' OR jenis LIKE'%$keyword%' OR kategori LIKE'%$keyword%' ");

while($pecah = $ambil->fetch_assoc())
{
    $semua_data[]=$pecah;
}

// echo "<pre>"; print_r($semua_data); echo "</pre>";



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
               <h4 class="mt-3 ml-3"> <i class="fa fa-search fa-1x"></i>  Pencarian : <?= $keyword  ?></h4>
                <?php if(empty($semua_data)): ?>
                    <div class="alert alert-danger"> Pencarian Barang : " <?= $keyword ?> " Tidak ditemukan </div>

                <?php endif ?>
                <div class="row ">
                    <?php foreach ($semua_data as $key => $value) : ?>
                    <div class="col-6 col-md-3 mt-3">
                        <div class="card shadow-sm">
                            <img src="img/produk/<?php echo $value['foto_barang']; ?>" class="card-img-top " alt="">
                            <div class="card-body">

                                <h5 class="card-title"><?php echo $value['nama_barang']; ?> </h5>
                                <h4 class="card-text"> Rp. <?php echo number_format($value['harga_barang']); ?></h4>
                                <p class="card-text">
                                <?php echo $value['jenis']; ?> | <?php echo $value['kategori']; ?>
                                </p>
                                <!-- <a href="beli.php?id=<?php echo $barang['id_barang']; ?>" class="btn btn-sm mt-2 ">Beli</a> -->
                                <a href="detail.php?id=<?php echo $value['id_barang']; ?>" class="btn btn-sm btn-info mt-2 ">Beli</a>
                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>
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