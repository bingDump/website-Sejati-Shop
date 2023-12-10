<h4 class="text-center dm"> Data Pembayaran</h4>

<?php 

$id_pembelian = $_GET['id'];

$ambil = $db->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembayaran.id_pembelian='$id_pembelian'");
$detailbayar = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detailbayar);
// echo "</pre>";

?>
<div class="row">
    <div class="col-md-6 col-12">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo $detailbayar["nama"];  ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo $detailbayar["bank"]; ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo $detailbayar["tanggal"];  ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?php echo number_format($detailbayar["jumlah"]); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6 col-12">
        <img class="w-75 h-75" src="../img/fotobuktibayar/<?php echo $detailbayar["bukti_pembayaran"];  ?>" alt="foto bukti pembayaran"  class="img img-responsive h-auto w-100">
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-12">
        <form action="" method="post">
            <div class="form-group">
                <label for="resi">Nomor Resi Pengiriman</label>
                <input type="number" id="resi" name="resi" class="form-control" value="<?php echo $detailbayar["resi_pengiriman"]; ?>" required placeholder="Nomor Resi Pengiriman">
            </div>
            <div class="form-group">
                <label for="status">Status Pembelian</label>
                <select name="status" id="status" class="form-control">
                    <option value="">pilih status pembelian</option>
                    <option value="Valid">Valid</option>
                    <option value="Tidak Valid">Tidak Valid</option>
                    <option value="Dikirim">Dikirim</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <button name="proses" class="btn btn-primary w-25 ">Proses</button>
            </div>
        </form>
        <?php
            if(isset($_POST["proses"]))
            {
                $resi = $_POST["resi"];
                $status = $_POST["status"];
                $db->query("UPDATE pembelian SET resi_pengiriman ='$resi', status_pembelian='$status' WHERE id_pembelian ='$id_pembelian'" );

                echo "<script> alert('Data Pembelian Ter-UPDATE !');</script>";

                echo "<script>location='index.php?halaman=pembelian';</script>";
            }
        ?>
    </div>
</div>