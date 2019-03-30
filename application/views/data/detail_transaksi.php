<div class="container">
    <div class="row justify-content-center text-center mt-5 ml-4">
        <div class="col-md-9 bg-white mt-4 pt-2 pb-1">
            <h3>Transaksi <?= date('Y-m-d') ?> </h3><hr>
            <table class="table table-hover w-100">
                <thead class="thead-light text-center">
                    <tr>
                        <th>No</th>
                        <th width="200px">Nama Masakan</th>
                        <th width="250px">Keterangan</th>
                        <th>Jumlah</th>
                        <th width="150px">Harga</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                            $no = 1;
                            foreach($dataOrder as $data):
                        ?>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $data->nama_masakan ?></td>
                            <td>
                                <input type="hidden" name="id_detail_order" value="$data->id_detail_order">
                                <?= $data->keterangan ?>
                            </td>
                            <td class="text-center"><?= $data->jumlah ?></td>
                            <td class="text-right">IDR <?= number_format($data->harga_jumlah) ?>,-</td>
                        </tr>
                        <?php 
                            endforeach;
                        ?>
                    </tbody>
            </table>
            <table class="table text-center table-hover w-100">
                <thead class="thead-light text-center">
                    <tr>
                        <th>Total Bayar</th>
                        <th>Uang Masuk</th>
                        <th>Uang Kembali</th>
                    </tr>
                    </thead>
                <tbody>
                    <tr>
                        <?php foreach($transaksi as $ts): ?>
                        <td>IDR <?= number_format($ts->uang_masuk) ?></td>
                        <td>IDR <?= number_format($ts->total_bayar) ?></td>
                        <td>IDR <?= number_format($ts->uang_kembali) ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="<?= base_url('Print_Laporan/index/'.$ts->id_transaksi) ?>" class="btn btn-primary mb-3">Print</a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
