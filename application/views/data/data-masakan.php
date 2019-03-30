<div class="container pt-5 mt-3">
    <div class="row justify-content-center ml-4 pb-5">
        <div class="col-md-11 bg-white mt-2 pt-2 pb-1">
            <h3>Data Masakan</h3>
            <?= form_open('Data/createMasakan') ?>
            <table class="table table-inverse table-hover">
                <tbody>
                    <tr>
                        <input type="hidden" name="id_masakan" value="">
                        <td width="300px"><input type="text" class="form-control" name="nama_masakan" id="nama_masakan" placeholder="Nama Masakan"></td>
                        <td width="200px"><input type="number" class="form-control" name="harga" id="harga" placeholder="Harga"></td>
                        <td width="180px"><input type="text" class="form-control" name="status_masakan" id="status" placeholder="Status"></td>
                        <td width="180px"><input type="text" class="form-control" name="type" id="type" placeholder="Type"></td>
                        <td><button type="submit" class="btn btn-success"><i class="fas fa-plus-circle fa-1x"></i><b> TAMBAH</b></button></td>
                    </tr>
                </tbody>
            </table>

            <?= form_close() ?>
            <table class="table table-responsive table-hover">
                <thead class="thead-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Masakan</th>
                        <th>Harga</th>
                        <th>Status Masakan</th>
                        <th>Type</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                            $no = 1;
                            foreach($data_masakan as $setM):
                            echo form_open('Data/updateMasakan');
                        ?>
                            <input type="hidden" name="id_masakan" value="<?= $setM->id_masakan ?>">
                            <td scope="row"><?= $no++ ?></td>
                            <td><input name="nama_masakan" type="text" value="<?= $setM->nama_masakan ?>" class="form-control form-control-sm w-100"></td>
                            <td><input name="harga" type="text" value="<?= $setM->harga ?>" class="form-control form-control-sm"></td>
                            <td><input name="status_masakan" type="text" value="<?= $setM->status_masakan ?>" class="form-control form-control-sm"></td>
                            <td><input name="type" type="text" value="<?= $setM->type ?>" class="form-control form-control-sm"></td>
                            <td>
                            <input type="submit" class="btn btn-sm btn-primary" value="UBAH">
                            <a href="<?= base_url('Data/deleteMasakan/').$setM->id_masakan ?>" class="btn btn-sm btn-danger">HAPUS</a>
                            </td>
                        </tr>
                        <?php
                            echo form_close();
                            endforeach 
                        ?>
                    </tbody>
            </table>

<div class="row fixed-bottom justify-content-center mb-3">
    <div class="col-md-6">
        <h5><?= $this->session->flashdata('masakan'); ?></h5>
    </div>
</div>
        </div>
    </div>
</div>