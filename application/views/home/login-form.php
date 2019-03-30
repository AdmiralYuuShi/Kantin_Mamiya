<div class="login">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 bg-white text-center pt-3 pb-3">
            <h3>Login</h3><hr>
            <?php if($this->session->flashdata('info')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('info'); ?>
                </div>
            <?php endif ?>
            <div class="row justify-content-center">
            <div class="col-md-8">
            <?= form_open('Login/setLogin') ?>
            <div class="form-group">
              <label for="no_meja">No Meja</label>
              <input type="text" class="form-control" name="no_meja" id="no_meja" placeholder="No Meja">
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="Username">
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <input type="submit" name="login" class="btn btn-primary" value="Login">
            <?= form_close() ?>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>