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
                        <tr>
                            <?php 
                            echo form_open('Data/prosesTransaksi');
                            foreach($totalHarga as $total): 
                            ?>
                            <td></td>
                            <td class="text-right">Jumlah Uang : IDR</td>
                            <td><input type="number" class="form-control form-control-sm" name="uang_masuk"></td>
                            <td>Total Harga : </td>
                            <td class="text-right">IDR <?= number_format($total->total_harga) ?>,-</td>
                            <input type="hidden" name="total_bayar" value="<?= $total->total_harga ?>">
                            <?php endforeach; ?>
                            <?php foreach($orderById as $do): ?>
                            <input type="hidden" name="id_user" value="<?= $do->id_user ?>">
                            <input type="hidden" name="id_order" value="<?= $do->id_order ?>">
                            <?php endforeach; ?>
                        </tr>
                    </tbody>
            </table>
            <input type="submit" name="transaksi" class="btn btn-success mb-3" value="Proses Transaksi">
            <?= form_close(); ?>
        </div>
    </div>
</div>
