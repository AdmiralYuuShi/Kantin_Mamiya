<?php 

class Order_Masakan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Order_Model');
    }

    public function setDetailOrder(){
        $query = $this->Order_Model->createDetailOrder();
        if($query > 0){
            redirect(base_url()); 
        } 
    }

    public function detailOrder(){
        $data['dataOrder'] = $this->Order_Model->getDataOrder();
        $data['totalHarga'] = $this->Order_Model->totalHarga()->result();
        $data['status_order'] = $this->Order_Model->setIdOrder();
        $this->load->view('tmpl/header');
        $this->load->view('tmpl/navbar', $data);
        $this->load->view('home/detail-order', $data);
        $this->load->view('tmpl/footer');
    }

    public function deleteDetailOrder(){
        $query = $this->Order_Model->deleteDetailOrder();
        if($query > 0){
            redirect(base_url('/Order_Masakan/detailOrder'));
        }
    }

    public function updateOrder(){
        $this->Order_Model->updateOrder();
        redirect(base_url());
    }

    public function pesananDiterima(){
        $this->Order_Model->pesananDiterima();
        redirect(base_url());
    }

    public function pesananSelesai(){
        $this->Order_Model->pesananSelesai();
        redirect(base_url());
    }

}