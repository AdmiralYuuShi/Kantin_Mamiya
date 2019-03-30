<div class="container">
    <div class="row justify-content-end mt-5 ml-4">
        <div class="col-md-10 bg-white mt-4 pt-2 pb-3">

        <?php 
        foreach($status_order as $data){
        	$status = $data->status_order;
        }
        if($status == "Pesanan Diterima"): ?>
        	<h3>Pesanan Diterima</h3>
            <p>Selamat Menikmati . . .</p>
            <a href="<?=base_url('Order_Masakan/pesananSelesai');?>" class="btn btn-primary btn-lg">Pesanan Selesai</a>
        <?php elseif($status == "Pesanan Selesai"): ?>
	        <h3>Pesanan Selesai</h3>
            <p>Silakan datangi kasir untuk proses transaksi . . .</p>
            <a href="<?=base_url('Login/setLogout');?>" class="btn btn-danger btn-lg">Logout</a>
 		<?php else: ?>
	        <h3>Pesanan Sedang Diproses</h3>
            <p>Harap menunggu, Pesanan anda sedang diproses . . .</p>
            <a href="<?=base_url('Order_Masakan/pesananDiterima');?>" class="btn btn-success btn-lg">Pesanan Diterima</a>
 		<?php endif ?>
        </div>
    </div>
</div>