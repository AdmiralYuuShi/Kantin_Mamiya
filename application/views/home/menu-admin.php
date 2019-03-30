<div class="container">
    <div class="row justify-content-end ml-4">
        <div class="col-md-10 bg-white mt-2 pt-2 pb-3 text-center">
            <h3>Menu Administrasi</h3>
            <?php if($this->session->userdata('level') == 5 || 
                     $this->session->userdata('level') == 4 || 
                     $this->session->userdata('level') == 3 ): ?>
            <a href="<?= base_url('Data/dataUser') ?>" class="btn btn-lg btn-success">Data User</a>
            <?php endif ?>
            <?php if($this->session->userdata('level') == 5 || 
                     $this->session->userdata('level') == 4 || 
                     $this->session->userdata('level') == 3 ): ?>
            <a href="<?= base_url('Data/dataMasakan') ?>" class="btn btn-lg btn-primary">Data Masakan</a>
            <?php endif ?>
            <?php if($this->session->userdata('level') == 3 ): ?><hr/>
            <h3>Transaksi</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?= form_open('Data/transaksi') ?>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="id_order" placeholder="Masukkan ID Order . . .">
                      <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">Proses Transaksi</button>
                      </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
            <?php endif ?>
            <?php if($this->session->userdata('level') == 2 ): ?>
            <a href="<?= base_url('Data/laporanMasakan') ?>" class="btn btn-lg btn-success">Laporan Masakan</a>
            <a href="<?= base_url('Data/laporanUser') ?>" class="btn btn-lg btn-primary">Laporan Data User</a>
            <a href="<?= base_url('Data/laporanKeuangan') ?>" class="btn btn-lg btn-danger">Laporan Keuangan</a>
            <?php endif ?>
        </div>
    </div>
</div>