<?php
session_start();
$db = new mysqli("localhost","root","","tokosejati");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="fontawesome/css/fontt-awesome.min.css"> -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <title>Login Admin</title>
</head>

<body>




    <div class="container container-fluid justify-content-center ">


        <div class="row justify-content-center ">
            <div class="col-12 col-lg-4 log p-3">
                <strong class="hed mb-4">Administrasi Toko Sejati</strong>


                <form action="" method="POST">
                    <div class="form-group mt-2">
                        <label for="username"> Username</label>
                        <input type="text" class="form-control form-control-sm" id="username" name="usernameAdmin"
                            autofocus autocomplete="off" placeholder="username admin">
                    </div>
                    <div class="form-group">
                        <label for="password"> Password</label>
                        <input type="password" class="form-control form-control-sm" id="password" name="passwordAdmin"
                            placeholder="password admin">
                    </div>
                    <div class="form-group">

                        <button class="btn btn-sm btn-primary" type="submit" name="submit">Login Admin</button>
                    </div>

                </form>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $ambil = $db->query("SELECT * FROM admintoko WHERE usernameAdmin='$_POST[usernameAdmin]' AND passwordAdmin ='$_POST[passwordAdmin]'");

                        $ygsama = $ambil->num_rows;

                        if($ygsama==1){
                            $_SESSION['admintoko']=$ambil->fetch_assoc();
                            echo "<script>alert('Login Berhasil !');</script>";
                            echo "<meta http-equiv ='refresh' content='1;url=index.php'>";
                        }else{
                            echo "<script>alert('Login Gagal !');</script>";
                            echo "<meta http-equiv ='refresh' content='1;url=login.php'>";
                        }
                    }
                ?>



            </div>

        </div>

    </div>





    <script src="../js/jquery-3.2.1.slim.min.js">
    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"> </script>
</body>

</html>