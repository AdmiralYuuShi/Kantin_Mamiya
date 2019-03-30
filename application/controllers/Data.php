<?php 

class Data extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->model('Order_Model');
        $this->load->model('Masakan_Model');
        $this->load->model('Transaksi_Model');
    }

    public function transaksi(){
        $sess = array(
                'id_order' => $this->input->post('id_order')
            );
        $this->session->set_userdata($sess);
        $data['dataOrder'] = $this->Order_Model->getDataOrder();
        $data['totalHarga'] = $this->Order_Model->totalHarga()->result();
        $data['status_order'] = $this->Order_Model->setIdOrder();
        $data['orderById'] = $this->Order_Model->getOrderById()->result();
        $this->load->view('tmpl/header');
        $this->load->view('tmpl/navbar', $data);
        $this->load->view('data/transaksi', $data);
        $this->load->view('tmpl/footer');
    }

    public function prosesTransaksi(){
        $this->Transaksi_Model->insertTransaksi();
        redirect(base_url('Data/hasilTransaksi'));
    }

    public function hasilTransaksi(){
        $data['dataOrder'] = $this->Order_Model->getDataOrder();
        $data['totalHarga'] = $this->Order_Model->totalHarga()->result();
        $data['status_order'] = $this->Order_Model->setIdOrder();
        $data['orderById'] = $this->Order_Model->getOrderById()->result();
        $data['transaksi'] = $this->Transaksi_Model->getTransaksi()->result();
        $this->load->view('tmpl/header');
        $this->load->view('tmpl/navbar', $data);
        $this->load->view('data/detail_transaksi', $data);
        $this->load->view('tmpl/footer');
    }

    public function dataUser(){
        $data['status_order'] = $this->Order_Model->setIdOrder();
        $data['allUser'] = $this->User_Model->getUser(); 
        $this->load->view('tmpl/header');
        $this->load->view('tmpl/navbar', $data);
        $this->load->view('data/data-user', $data);
        $this->load->view('tmpl/footer');
    }

    public function createUser(){
        if($this->User_Model->createUser()){
            $this->session->set_flashdata('user', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Ditambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        }
        redirect(base_url('Data/dataUser'));
    }

    public function updateUser(){
        if($this->User_Model->updateUser()){
            $this->session->set_flashdata('user', '
                <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                Berhasil Diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        }
        redirect(base_url('Data/dataUser'));
    }

    public function deleteUser(){
        if($this->User_Model->deleteUser()){
            $this->session->set_flashdata('user', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Berhasil Dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect(base_url('Data/dataUser'));
        }
    }

    public function dataMasakan(){
        $data['status_order'] = $this->Order_Model->setIdOrder();
        $data['data_masakan'] = $this->Masakan_Model->getAllMasakan();
        $this->load->view('tmpl/header');
        $this->load->view('tmpl/navbar', $data);
        $this->load->view('data/data-masakan', $data);
        $this->load->view('tmpl/footer');
    }

    public function createMasakan(){
        if($this->Masakan_Model->createMasakan()){
            $this->session->set_flashdata('masakan', '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Ditambah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        }
        redirect(base_url('Data/dataMasakan'));
    }
    public function updateMasakan(){
        if($this->Masakan_Model->updateMasakan()){
            $this->session->set_flashdata('masakan', '
                <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                Berhasil Diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        }
        redirect(base_url('Data/dataMasakan'));
    }

    public function deleteMasakan(){
        if($this->Masakan_Model->deleteMasakan()){
            $this->session->set_flashdata('masakan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Berhasil Dihapus
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
            redirect(base_url('Data/dataMasakan'));
        }
    }

}