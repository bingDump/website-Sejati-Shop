<?php session_start();  ?>
<?php include 'koneksi.php'; ?>
<?php


$idbarang = $_GET["id"];


//ambil data
$ambil = $db->query("SELECT * FROM barang WHERE id_barang='$idbarang'");
$row = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($row);
// echo "</pre>";

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

        
                <div class="detail pt-4">
                    <div class="row mt-5 ">
                        <div class="col-md-6">
                            <img src="img/produk/<?php echo $row["foto_barang"];  ?>" class="img-fluid img-thumbnail img-responsive" alt="">
                        </div>
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <h3><?php echo $row["nama_barang"];  ?></h3>

                                <h5>Rp. <?php echo number_format($row["harga_barang"]);  ?></h5>
                                <dl class="row">
                                    <dt class="col-2">jenis </dt>
                                    <dd class="col-10">&nbsp;:&nbsp;<?php echo $row["jenis"];  ?></dd>

                                    <dt class="col-2">Kategori</dt>
                                    <dd class="col-10">&nbsp;:&nbsp;<?php echo $row["kategori"];  ?></dd>

                                    <dt class="col-2">Berat</dt>
                                    <dd class="col-10">&nbsp;:&nbsp; <?php echo number_format($row["berat_barang"]);  ?> gr.
                                                 
                                                
                                    
                                    </dd>

                                    <dt class="col-2">Stok</dt>
                                    <dd class="col-10">&nbsp;:&nbsp;<?php echo $row["stok"];  ?> <?php if($row["kategori"]=="Eceran") :  ?> Kg <?php else : ?> Buah. <?php endif ?> </dd>
                                    
                                </dl>

                                    <?php if($row["kategori"]=="Eceran") : ?>
                                        <input type="number" class=" rounded p-1 w-75" min="5" max="20" required placeholder="jumlah kilogram " name="jumlah" id="beratbarang"><label for="beratbarang">&nbsp; Kg.</label>
                                    <?php else : ?>
                                        <input type="number" name="jumlah" min="1" max="<?php echo $row["stok"];  ?>" placeholder="jumlah satuan buah" class="form-control" required>
                                    <?php endif ?>
                                    <button class="btn mt-3" name="beli">Beli</button>
                            </form>
                            <p class="info_barang"><small><?php echo $row["info_barang"];  ?></small> </p>

                            <?php 
                                if (isset($_POST["beli"]))
                                {
                                    $jumlah = $_POST["jumlah"];
                            

                                    //masukan ke kranjang
                                    $_SESSION["keranjang"][$idbarang] = $jumlah;
                                   
                                    // echo "<pre>"; print_r($_SESSION["keranjang"]); echo "</pre>";

                                    echo "<Script> alert('barang telah masuk ke Keranjang Belanja');</script>";
                                    
                                    echo "<Script> location='keranjang.php';</script>";
                                }



                            ?>


                            <p class="info_detail mt-1">** kategori kemasan ongkir berlaku perbuah.
                                <br> kategori eceran
                                ongkir
                                berlaku perPesanan (max:20kg). **</p>
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