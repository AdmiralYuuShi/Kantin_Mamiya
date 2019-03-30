<div class="container pt-5 mt-3">
    <div class="row justify-content-center ml-4 pb-5">
        <div class="col-md-11 bg-white mt-2 pt-2 pb-1">
            <h3>Data User</h3>
            <?= form_open('Data/createUser') ?>
            <table class="table table-inverse table-hover">
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Nama User"></td>
                        <td><input type="text" class="form-control" name="username" id="username" placeholder="Username"></td>
                        <td width="150px"><input type="password" class="form-control" name="password" id="password" placeholder="Password"></td>
                        <?php if($this->session->userdata('level') == 5): ?>
                        <td width="90px"><input type="text" class="form-control" name="level" id="level" placeholder="Level"></td>
                        <?php else: ?>
                        <td width="90px"><input type="hidden" class="form-control" name="level" id="level" value="1"></td>
                        <?php endif ?>
                        <td><button type="submit" class="btn btn-success"><i class="fas fa-plus-circle fa-1x"></i><b> TAMBAH</b></button></td>
                    </tr>
                </tbody>
            </table>

            <?= form_close() ?>
            <table class="table table-responsive table-hover">
                <thead class="thead-light text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                            $no = 1;
                            foreach($allUser as $user):
                            echo form_open('Data/updateUser');
                        ?>
                            <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                            <td scope="row"><?= $no++ ?></td>
                            <td><input name="nama_user" type="text" value="<?= $user->nama_user ?>" class="form-control form-control-sm w-100"></td>
                            <td><input name="username" type="text" value="<?= $user->username ?>" class="form-control form-control-sm"></td>
                            <td><input name="password" type="text" value="<?= $user->password ?>" class="form-control form-control-sm"></td>
                            <td><input name="id_level" type="text" value="<?= $user->id_level ?>" class="form-control form-control-sm"></td>
                            <td>
                            <input type="submit" class="btn btn-sm btn-primary" value="UBAH">
                            <a href="<?= base_url('Data/deleteUser/').$user->id_user ?>" class="btn btn-sm btn-danger">HAPUS</a>
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
        <h5><?= $this->session->flashdata('user'); ?></h5>
    </div>
</div>
        </div>
    </div>
</div>