<?php
session_start();
//koneksi database
include '../koneksi.php';

if(!isset($_SESSION['admintoko'])){
    echo "<script> alert('Anda Harus Login');</script>";
    echo "<script> location'login.php';</script>";
    header('location:login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../warna.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome/css/fontt-awesome.min.css"> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <title>Administrasi</title>
</head>

<body>
    <div class="layout">
        <!-- Sidebar -->
        <div class="layout_sidebar">

            <a class="sidebar_trigger shadow" href="#0">


                <i class="fa fa-th-list fa-lg"></i>

            </a>

            <nav class="sidebar_nav shadow">
                <div class="head">
                    <p>Administrasi</p>
                </div>

                <ul>

                    <li class="logo"> TOKO<span>Sejati</span></li>
                    
                    <li>
                        <a class="sidebar_nav-link" href="index.php"><i
                                class="fa fa-home fa-lg "></i><span>Home</span></a>
                    </li>
                    <li><a class="sidebar_nav-link" href="index.php?halaman=barang"><i
                                class="fa fa-cubes fa-lg"></i><span>Barang</span></a>
                    </li>
                    <li>
                        <a class="sidebar_nav-link" href="index.php?halaman=pelanggan"><i class="fa fa-users fa-lg"></i>
                            <span>Pelanggan</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="sidebar_nav-link" href="index.php?halaman=ongkir"><i class="fa fa-truck fa-lg"></i>
                            <span>Ongkir</span>
                        </a>
                    </li> -->
                    <li>
                        <a class="sidebar_nav-link" href="index.php?halaman=pembelian"><i
                                class="fa fa-shopping-cart fa-lg"></i>
                            <span>Pembelian</span>
                        </a>
                    </li>
                    <li>
                        <a class="sidebar_nav-link" href="index.php?halaman=lap_pembelian"><i
                                class="fa fa-copy fa-lg"></i>
                            <span>Laporan_Pembelian</span>
                        </a>
                    </li>
                    <li class="login">
                        <a class="sidebar_nav-link" href="index.php?halaman=logout"><i
                                class="fa fa-sign-out fa-lg"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>


            </nav>
        </div>

        <!-- Content -->
        <main class="layout_content">

            <div class="barang container mr-0 ">

                <?php
                    if(isset($_GET['halaman'])){
                        if($_GET['halaman']=='barang'){
                            include 'barang.php';
                        }
                        elseif($_GET['halaman']=='tambahbrg'){
                            include 'tambahbrg.php';
                        }
                        elseif($_GET['halaman']=='hapusbrg'){
                            include 'hapusbrg.php';
                        }
                        elseif($_GET['halaman']=='ubahbrg'){
                            include 'ubahbrg.php';
                        }
                        elseif($_GET['halaman']=='pelanggan'){
                            include 'pelanggan.php';
                        }
                        elseif($_GET['halaman']=='tambahplg'){
                            include 'tambahplg.php';
                        }
                        elseif($_GET['halaman']=='hapusplg'){
                            include 'hapusplg.php';
                        }
                        elseif($_GET['halaman']=='ubahplg'){
                            include 'ubahplg.php';
                        }  
                        elseif($_GET['halaman']=='pembelian'){
                            include 'pembelian.php';
                        }
                        elseif($_GET['halaman']=='pembayaran'){
                            include 'pembayaran.php';
                        }
                        elseif($_GET['halaman']=='lap_pembelian'){
                            include 'lap_pembelian.php';
                        }
                        elseif($_GET['halaman']=='detailpembelian'){
                            include 'detailpembelian.php';
                        }
                        elseif($_GET['halaman']=='logout'){
                            include 'logout.php';
                        }
                    }
                    else{
                        include 'home.php';
                    }
            
                ?>

            </div>

            <footer class="footer mt-3 p-3 mb-0 ">

                <div class="row foot">
                    <div class="col-lg-12">
                        <p>Admin : <?php echo $_SESSION["admintoko"]["namaAdmin"]; ?></p>
                    </div>
                </div>
            </footer>
        </main>


    </div>


    <script src="../js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"> </script>

</body>



<!-- elseif($_GET['halaman']=='ongkir'){
                            include 'ongkir.php';
                        }
                        elseif($_GET['halaman']=='hapusOngkir'){
                            include 'hapusOngkir.php';
                        }
                        elseif($_GET['halaman']=='ubahOngkir'){
                            include 'ubahOngkir.php';
                        }
                        elseif($_GET['halaman']=='tambahOngkir'){
                            include 'tambahOngkir.php';
                        } -->

</html>


