<?php
$ambil = $db->query("SELECT * FROM admintoko");
$row = $ambil->fetch_assoc();

?>
<br><br><br>

<div class="container text-center home">
  <h4 class="">SELAMAT DATANG <br><br>
    <?php echo $row['namaAdmin'];  ?>
  <br><br> di Administrasi Toko Sejati</h4>
  <!-- <pre><?php print_r($_SESSION); ?></pre> -->
</div>