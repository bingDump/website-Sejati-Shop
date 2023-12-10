<?php
session_start();

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

    <title>Panduan</title>
</head>

<body>

    <div class="layout">
         <!-- Sidebar -->
         <?php include 'menuside.php'; ?>
        <!-- end sidebar -->

        <main class="layout_content">
            <h3 class="mt-5 mb-3 pt-3 ml-3 heady">Panduan</h3>
            <div class="row">
                <div class="col-md-6 col-12 text-center">
                    <img class="w-50 h-75 float-left" src="img/panduan/produk.PNG" alt="">
                    <img class="w-50 h-50" src="img/panduan/detail.PNG" alt="">
                </div>
                <div class="col-md-6 col-12 p-3">
                    <p>Terdapat 2 kategori yang dijual pada toko ini yaitu kemasan dan eceran</p>
                    <p>1. Klik tombol beli untuk melihat detail beras dan jumlah stok yang tersedia
                        <br> 2. masukan jumlah beras yang akan dibeli, <span class="alert-danger"> untuk beras kategori
                            kemasan maka jumlah yang dimasukan berupa satuan buah, tapi untuk kategori eceran jumlah
                            yang dimasukan berupa jumlah kilogram beras yang ingin dibeli</span> </p>

                </div>
                <div class="col-md-6 col-12">
                    <img class="w-100 h-100" src="img/panduan/keranjang.PNG" alt="">

                </div>
                <div class="col-md-6 col-12">
                    <p>3. kemudian barang akan masuk ke keranjang anda, jika anda ingin menambahkan beras yang mau
                        dibeli maka klik tombol lanjut Belanja, tapi jika ingin checkout maka klik tombol checkout.</p>

                </div>

                <div class="col-md-6 col-12">
                    <img class="w-100 h-100" src="img/panduan/checkout.png" alt="">

                </div>
                <div class="col-md-6 col-12">
                    <p>4. pada checkout cek kembali belanjaanmu <br> 5. pilih ongkos kirim sesuai alamat pengiriman
                        (lihat lingkaran merah)<br>
                        6. isi catatan jika ingin mengirim catatan ke penjual <br> 7. isi alamat pengiriman dengan
                        lengkap. <br> <span class="alert-danger"> *untuk biaya pengiriman, jika beras kemasan maka
                            biaya pengiriman dihitung perbuah, tetapi jika eceran maka biaya pengiriman dihitung per
                            pesanan minimal 5kg maksimal 20kg.</span></p>

                </div>
                <div class="col-md-6 col-12">
                    <img class="w-100 h-100" src="img/panduan/nota.PNG" alt="">

                </div>
                <div class="col-md-6 col-12">
                    <p>8. jika tombol chekout sudah ditekan maka akan muncul nota pembelian <br> 9. lakukan pembayaran
                        ke rekening yang sudah tersedia sesuai dengan total pembelian</p>

                </div>
                <div class="col-md-6 col-12">
                    <img class="w-100 h-100" src="img/panduan/riwayatbeli.PNG" alt="">

                </div>
                <div class="col-md-6 col-12">
                    <p>10. klik menu riwayat pembelian untuk melakukan pembayaran <br> 11. klik nota untuk melihat nota
                        pembelian <br>12. klik pembayaran untuk melakukan meng-upload bukti pembayaran </p>

                </div>
                <div class="col-md-6 col-12">
                    <img class="w-100 h-100" src="img/panduan/pembayaran.PNG" alt="">

                </div>
                <div class="col-md-6 col-12">
                    <p>13. jika sudah melakukan pembayaran maka masukan data penyetor dan bank kemudian upload file foto
                        bukti pembayaran maksimal 2 mb dengan format jpg. </p>

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