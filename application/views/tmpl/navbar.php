<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">Kantin 間宮</a>
        <a class="text-white ml-3">ID Order <span class="badge badge-pill badge-success"><?= $this->session->userdata('id_order') ?></span></a>
        <?php foreach($status_order as $data): ?>
            <a class="text-white ml-3">Status Pesanan <span class="badge badge-pill badge-primary"><?= $data->status_order ?></span></a>    
        <?php endforeach ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                <a href="<?= base_url('home/about') ?>" class="nav-item nav-link active">About</a>
                <a href="<?= base_url('Login/setLogout') ?>" class="nav-item nav-link active">Logout</a>
            </div>
        </div>
    </div>
</nav>    
