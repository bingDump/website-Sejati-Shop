<?php include 'koneksi.php'; ?>

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
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5 mb-5 justify-content-between">
            <div class="col-lg-8 register  ">
                <h5 class="text-center mt-5 mb-3 shadow-sm p-2">Daftar Pelanggan</h5>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input class="form-control form-control-sm" type="text" id="nama" name="nama_pelanggan"
                            placeholder="nama lengkap" autofocus autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control form-control-sm" type="text" id="username" name="username"
                            placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control form-control-sm" type="password" id="password" name="password"
                            placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control form-control-sm" name="alamat" id="alamat" cols="30" rows="5"
                            placeholder="Alamat Lengkap" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="telpon">No.Telepon</label>
                        <input class="form-control form-control-sm" type="number" id="telpon" name="no_handphone"
                            placeholder="nomor telepon" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" type="submit" name="daftar">Daftar</button>
                    </div>
                </form>
                <?php  
                        if(isset($_POST['daftar']))
                        {
                            $namaplg = htmlspecialchars($_POST["nama_pelanggan"]);
                            $username = htmlspecialchars($_POST["username"]);
                            $pass = htmlspecialchars($_POST["password"]);
                            $telpon = htmlspecialchars($_POST["no_handphone"]);
                            $alamat = htmlspecialchars($_POST["alamat"]);


                            //cek username ada yg sama atau tidak
                            $ambil = $db->query("SELECT * FROM pelanggan WHERE username='$username'");
                            $yangSama = $ambil->num_rows;
                            if($yangSama==1)
                            {
                                echo "<Script>alert('Username Sudah digunakan, Pendaftaran Gagal !'); </script>";
                                echo "<Script>location='register.php';</script>";
                            }else {
                                //insert ke table pelanggan

                                $db-> query("INSERT INTO pelanggan 
                                        (nama_pelanggan,username,password_plg,telpon_pelanggan,alamat)
                                        VALUES ('$namaplg','$username','$pass','$telpon','$alamat')"
                                        );

                                echo "<Script>alert('pendaftaran berhasil, silahkan login'); </script>";
                                echo "<Script>location='loginuser.php';</script>";
                            }

                        }


                ?>



            </div>
            <div class="col-10 col-lg-4 registerside">


            </div>
        </div>
    </div>






    <script src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>

</body>

</html>
