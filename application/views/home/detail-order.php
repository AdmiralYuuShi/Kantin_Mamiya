<div class="container">
    <div class="row justify-content-center text-center mt-5 ml-4">
        <div class="col-md-9 bg-white mt-4 pt-2 pb-1">
            <h3>Detail Pesanan </h3><hr>
            <table class="table table-hover w-100">
                <thead class="thead-light text-center">
                    <tr>
                        <th>No</th>
                        <th width="200px">Nama Masakan</th>
                        <th>Jumlah</th>
                        <th width="250px">Keterangan</th>
                        <th width="150px">Harga</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                            $no = 1;
                            foreach($dataOrder as $data):
                            form_open('Order_Masakan/updateOrder');
                        ?>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $data->nama_masakan ?></td>
                            <td class="text-center"><?= $data->jumlah ?></td>
                            <td>
                                <input type="hidden" name="id_detail_order" value="$data->id_detail_order">
                                <?= $data->keterangan ?>
                            </td>
                            <td class="text-right">IDR <?= number_format($data->harga_jumlah) ?>,-</td>
                            <td class="text-center">
                            <a href="<?= base_url('Order_Masakan/deleteDetailOrder/'.$data->id_detail_order) ?>" class="badge badge-danger badge-pill">BATAL</a>
                            </td>
                        </tr>
                        <?php 
                            form_close();
                            endforeach 
                        ?>
                        <tr>
                            <?php foreach($totalHarga as $total): ?>
                            <td colspan="4" >Total Harga :</td>
                            <td class="text-right">IDR <?= number_format($total->total_harga) ?>,-</td>
                        </tr>
                    </tbody>
            </table>
            <div class="row justify-content-end mr-3 mb-3">
            <?= form_open('Order_Masakan/updateOrder') ?>
                <input type="hidden" name="total_harga" value="<?= $total->total_harga ?>">
                <input type="submit" class="btn btn-success" value="Kirim Pesanan">
            <?= form_close() ?>
            <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
