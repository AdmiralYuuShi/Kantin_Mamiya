<div class="container pb-5">
    <div class="row justify-content-end ml-4">
        <div class="col-md-10 bg-white mt-2 pt-2 pb-3 text-center">

        
<h3>Semua Masakan</h3>
<hr>
<div class="row">
    <?php foreach ($allMasakan as $data): ?>
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5><?= $data->nama_masakan ?></h5>
                <h5><span class="badge badge-pill badge-success">IDR <?= $data->harga ?></span>
                <span class="badge badge-pill badge-primary"><?= $data->type ?></span></h5>
            </div>
            <div class="card-body">
                <img src="<?= base_url('assets/img/default.png') ?>" width="100%">
            </div>
            <?php if($data->status_masakan == 'Tersedia'): ?>
            <div class="card-footer">
                <?= form_open('Order_Masakan/setDetailOrder') ?>
                <input type="hidden" name="id_masakan" value="<?= $data->id_masakan ?>">
                <input type="hidden" name="harga" value="<?= $data->harga ?>">
                <input type="text" name="keterangan" class="form-control form-control-sm mb-2" placeholder="Keterangan">
                <div class="row">
                <div class="col-md-8">
                <input type="number" name="jumlah" class="form-control form-control-sm" placeholder="Jumlah">
                </div>
                <div class="col-md-3">
                <button type="submit" class="btn btn-sm btn-success">Pesan</button>
                </div>
                </div>
                <?= form_close(); ?>
            </div>
            <?php else: ?>
            <div class="card-footer bg-danger text-white">
                <h3>Habis</h3>
            </div>
            <?php endif ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>





        </div>
    </div>
</div>
