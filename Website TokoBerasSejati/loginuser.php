<?php
session_start();
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="fontawesome/css/fontt-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <title>Login Pelanggan</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 bg-info txxt pl-3 ">
                <h1>t o k o&nbsp; b e r a s&nbsp; s e j a t i</h1>
                <h2>Belanja Lebih Mudah</h2>
                <h6>beras berasal dari penggilingan setempat sehingga masih fresh</h6>
            </div>
            <div class="col-12 col-lg-4 loogin">
                <h5 class="text-center mt-5 shadow-sm">LOGIN</h5>
                <form action="" method="POST">
                    <div class="form-group lgin">
                        <label for="username">Username</label>
                        <input class="form-control form-control-sm" type="text" id="username" name="username" autofocus
                            placeholder="masukan username">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input class="form-control form-control-sm" type="password" id="password" name="password"
                            placeholder="masukan password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary mr-5" name="login">Login</button>
                        <a href="register.php" class="reg">belum punya akun?</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
     <?php
        if(isset($_POST["login"]))
        {

            $username = $_POST["username"];
            $password = $_POST["password"];
            $ambil = $db->query("SELECT * FROM pelanggan WHERE username ='$username' AND password_plg='$password' ");


            $akunCocok = $ambil->num_rows;
            //jika ada yg cocok, diloginkan
            if($akunCocok==1)
            {
                //ambil akun dalam array
                $akun = $ambil->fetch_assoc();
                $_SESSION['pelanggan'] =$akun;
                echo "<script>alert('Anda Berhasil login ');</script>";
               


                if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])){

                    echo "<script>location='checkout.php'; </script>";

                }else{

                    echo "<script>location='riwayatbeli.php'; </script>";
                }
                
            }else{
                echo "<script>alert('Anda Gagal login, Periksa kembali username dan password anda.. ');</script>";
                echo "<script>location='loginuser.php'; </script>";
            }
        }


    ?>





    <script src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>

</body>

</html>