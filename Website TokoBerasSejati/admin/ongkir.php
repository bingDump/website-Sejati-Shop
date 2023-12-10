<h4 class="text-center  dm">Ongkos Kirim</h4>
<div class="btn-konten fixed-top ">
    <a href="index.php?halaman=tambahOngkir" class="btn btn-sm btn-primary ">+Tambah</a>

</div>
<div class="isi-konten table-responsive">
    <table class="table table-bordered admin">
        <thead>
            <th>No</th>
            <th>Nama Kota</th>
            <th>Tarif</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php $ambil=$db->query("SELECT * FROM ongkir");?>
        <?php while($row = $ambil-> fetch_assoc()){?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama_kota"];?></td>
                <td>Rp. <?= number_format($row["tarif"]);?></td>
                <td><a id="ubh" href="index.php?halaman=ubahOngkir&id=<?php echo $row["id_ongkir"];?>" class="btn btn-sm btn-primary">ubah</a> | <a id="hps" href="index.php?halaman=hapusOngkir&id=<?php echo $row["id_ongkir"];?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus ?');" >hapus</a></td>
            </tr>
        <?php $i++; ?>
        <?php } ?>
        </tbody>
    </table>
</div>
