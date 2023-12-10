<?php
    $datapembelian = array();
    $tmulai ="-";
    $tselesai ="-";
    if(isset($_POST["lihat"]))
    {
        $tmulai = $_POST["tmulai"];
        $tselesai = $_POST["tselesai"];
        $ambil = $db->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tmulai' AND '$tselesai' AND status_pembelian!='pending' AND status_pembelian !='Tidak Valid'");

        while($data = $ambil->fetch_assoc())
        {
            $datapembelian[]=$data;
        }
        // echo "<pre>"; print_r($datapembelian); echo "</pre>";

    }
?>


<h4 class="text-center dm">Laporan Pembelian</h4>

<form action="" method="POST">
    <div class="row">
        <div class="col-md-5 col-12">
            <label for="tanggalmulai">Tanggal Mulai</label>
            <input type="date" class="form-control form-control-sm" id="tanggalmulai" name="tmulai">
        </div>    
        <div class="col-md-5 col-12">
            <label for="tanggalselesai">Tanggal Selesai</label>
            <input type="date" class="form-control form-control-sm" id="tanggalselesai" name="tselesai">
        </div>
        
    </div>
    <div class="row mt-4 mb-3">
        <div class="col-12 justify-content-start">
        
            <label for=""> <br> </label>
            <button class="btn btn-sm btn-primary w-25" name="lihat">Cek laporan</button>
        
        </div>
    </div>

</form>
<div class="alert alert-success">
    Laporan Pembelian dari tanggal   <b class="alert-link"><?= $tmulai ?></b>   hingga   <b class="alert-link"><?= $tselesai ?></b>
</div>

<div class="table-responsive">
    <table class="table table-bordered admin">
        <thead>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Total Pembelian</th>
            <th>Status</th>
        </thead>
        <tbody>
        <?php $total=0;  ?>
        <?php foreach ($datapembelian as $key => $value): ?>
        <?php $total+=$value["total_pembelian"]; ?>
            <tr>
                <td><?= $key+1; ?></td>
                <td><?= $value["nama_pelanggan"]; ?></td>
                <td><?= $value["tanggal_pembelian"]; ?></td>
                <td>Rp. <?= number_format($value["total_pembelian"]); ?></td>
                <td><?= $value["status_pembelian"]; ?></td>
            </tr>

        <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-right">Total</th>
                <th >Rp. <?= number_format($total); ?></th>
            </tr>
        </tfoot>
    
    </table>

</div>