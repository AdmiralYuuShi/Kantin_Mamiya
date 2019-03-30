<div class="container">
    <div class="row justify-content-end mt-5 ml-4">
        <div class="col-md-10 bg-white mt-4 pt-2 pb-1">
            <h3>Selamat Datang <?= $this->session->userdata('nama') ?> </h3>
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="<?= base_url() ?>">Home</a>
                <span class="breadcrumb-item active"></span>
            </nav>
        </div>
    </div>
</div>
