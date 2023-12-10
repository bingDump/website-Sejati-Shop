<?php
session_start();

include 'koneksi.php';

//jika tidak ada login pnelanggan //keamana

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script> alert('Silahkan Login');</script>";
    echo "<script>location='loginuser.php';</script>";
    exit();
}

//mendapatkan id
$idpem = $_GET["id"];
$ambil= $db->query("SELECT * FROM pembelian WHERE id_pembelian ='$idpem' ");
$detailbeli = $ambil->fetch_assoc();


//mendapatkan id yg beli
$idpelangganbeli = $detailbeli["id_pelanggan"];

//mendapatkan id yg login
$idpelangganlogin = $_SESSION["pelanggan"]["id_pelanggan"];

if($idpelangganbeli !== $idpelangganlogin)
{
    echo "<script> alert('Kamu Tidak dapat Melakukan itu!');</script>";
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

    <title>pembayaran</title>
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
        <?php include 'menuside.php'; ?>
        <!-- ned sidebar -->

        <!-- Content -->
        <main class="layout_content">

            <div class="barang container mr-0 ">
                
                <h3 class="mt-5 mb-3 pt-3">Pembayaran</h3>
                <div class="alert alert-success">
                    <p> Masukan bukti pembayaran atau Bukti Transfer disini. Total Tagihan Anda <strong> Rp. <?php echo number_format($detailbeli["total_pembelian"]); ?></strong></p>
                </div>
                <form  method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="penyetor">Nama Penyetor</label>
                        <input type="text" id="penyetor" name="penyetor" class="form-control form-control-sm" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="bank">BANK</label>
                        <input type="text" id="bank" name="bank" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" class="form-control form-control-sm" readonly value="<?php echo $detailbeli["total_pembelian"];?>" >
                    </div>
                    <div class="form-group">
                        <label for="fotobukti">Foto Bukti Pembayaran</label>
                        <input type="file" id="fotobukti" name="fotobukti" class="form-control form-control-sm bg-transparent border-0 mb-2">
                        <p class="text-danger mt-1">format foto JPG atau PNG (Max. 2 MB)</p>
                    </div>
                    
                    <div class="form-group">
                       <button class="btn btn-success p-1 w-25" name="kirim"><i
                                class="fa fa-paper-plane-o fa-lg"></i>  Kirim  </button>
                    </div>
                </form>

            </div>
                <?php  
                    if (isset($_POST["kirim"]))
                        {
                           

                            $namabukti = $_FILES["fotobukti"]["name"];
                            $lokasibukti = $_FILES["fotobukti"]["tmp_name"];
                            $namafile = date("YmdHis").$namabukti;
                            move_uploaded_file($lokasibukti,"img/fotobuktibayar/$namafile");

                            $penyetor = htmlspecialchars($_POST["penyetor"]);
                            $bank = htmlspecialchars($_POST["bank"]);
                            $jumlah = $_POST["jumlah"];
                            $tanggal = date("Y-m-d");

                            //menyimpan pembayaranan
                            $db->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti_pembayaran) VALUES('$idpem','$penyetor','$bank','$jumlah','$tanggal','$namafile')");

                            //UPDATE status pembelian pada table pembelian
                            $db->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian ='$idpem'");

                            echo "<script> alert('Terima kasih Telah Mengirimkan Bukti Pembayaran');</script>";
                            echo "<script>location='riwayatbeli.php';</script>";



                        }


                ?>

            <!-- footer -->
            <?php include 'footer.php';  ?>
            <!-- endfooter -->
        </main>


    </div>


    <script src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>

</body>

</html>