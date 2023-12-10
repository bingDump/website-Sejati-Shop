<div class="layout_sidebar ">

<a class="sidebar_trigger shadow" href="#0">


    <i class="fa fa-th-list fa-lg"></i>

</a>

<nav class="sidebar_nav shadow">
    <div class="head"> </div>

    <ul>

        <li class="logo"> TOKO<span>Sejati</span></li>
        <li>
            <form class="form-control-sm mb-3" action="pencarian.php" method="GET">
                <div class="input-group input-group-sm mb-3 mr-2">
                    <input type="text" class="form-control" placeholder="Pencarian.."
                        aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-sm mt-2" type="button" id="button-addon2"><i
                                class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </li>
        <li>
            <a class="sidebar_nav-link" href="index.php"><i class="fa fa-home fa-lg "></i><span>Home</span></a>
        </li>
        <li><a class="sidebar_nav-link" href="keranjang.php"><i
                    class="fa fa-shopping-cart fa-lg"></i><span>Keranjang</span></a>
        </li>
        <li>
            <a class="sidebar_nav-link" href="checkout.php"><i class="fa fa-credit-card fa-lg"></i>
                <span>Checkout</span>
            </a>
        </li>
            <?php if(isset($_SESSION["pelanggan"])): ?>
        <li>
            <a class="sidebar_nav-link" href="riwayatbeli.php"><i class="fa fa-list-alt fa-lg"></i>
                <span>Riwayat&nbsp;Belanja</span>
            </a>
            <!-- else 
            <a class="sidebar_nav-link" href="footer.php"><i class="fa fa-sign-in fa-lg"></i>
                <span>kontak</span>
            </a> -->
        </li>
            <?php endif ?>
        <li>
            <a class="sidebar_nav-link" href="panduan.php"><i class="fa fa-user fa-lg"></i>
                <span>Panduan</span>
            </a>
        </li>
        <li class="login">
            <?php if(isset($_SESSION["pelanggan"])): ?>
            <a class="sidebar_nav-link" href="logout.php"><i class="fa fa-sign-out fa-lg"></i>
                <span>Logout</span>
            </a>
            <?php else: ?>
            <a class="sidebar_nav-link" href="loginuser.php"><i class="fa fa-sign-in fa-lg"></i>
                <span>Login</span>
            </a>
            <?php endif ?>
            
        </li>

    </ul>
    <div class="container foot">
        <strong>Kontak Kami</strong>
        <p>Kp.pisangan RT 14/007 Ds.Satria Mekar, Kec.Tambun Utara, Kabupaten Bekasi. 17510 (Depan Perum
            Griya Kota Bekasi 2).</p>
        <p>Telepon. 089669648160 (WA/telepon). </p>
    </div>

</nav>
</div>