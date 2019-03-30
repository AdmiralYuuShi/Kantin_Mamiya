<div class="sidebar mt-4 ml-3 bg-white">
    <!-- <button type="button" class="list-group-item list-group-item-action active">Daftar Pesanan</button> -->
    <ul class="list-group">
        <li class="list-group-item active">Daftar Pesanan</li>
        <?php foreach($order_masakan as $data): ?>
        <li class="list-group-item"><?= $data->nama_masakan ?> x <?= $data->jumlah ?></li>
        <?php endforeach ?>
        <a href="<?= base_url('Order_Masakan/detailOrder') ?>" class="list-group-item active">Lihat Detail</a>
    </ul>
</div>