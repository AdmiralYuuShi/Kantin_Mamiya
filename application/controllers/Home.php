<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Masakan_Model');
		$this->load->model('Order_Model');
		if($this->session->userdata('status') != 'login'){
			$this->session->set_flashdata('info','Harap Login Terlebih Dahulu!');
			redirect(base_url('Login'));
		}
	}

	public function index()
	{

		$data['allMasakan'] = $this->Masakan_Model->getAllMasakan();
		$data['order_masakan'] = $this->Order_Model->getDataOrder();
		$status = $this->Order_Model->getDataOrder();
		$data['status_order'] = $this->Order_Model->setIdOrder();

		if($this->session->userdata('level') == 5 ){
			$this->load->view('tmpl/header', $data);
			$this->load->view('tmpl/navbar', $data);
			$this->load->view('home/welcome', $data);
			$this->load->view('home/menu-admin', $data);
			$this->load->view('tmpl/footer', $data);
		}
		elseif($this->session->userdata('level') == 4 ){
			$idOrder = $this->Order_Model->getIdOrder();
			foreach($idOrder as $sts){
				$status = $sts->status_order;
			}

			if($status == "Pesanan Diproses" || $status == "Pesanan Diterima" || $status == "Pesanan Selesai"){
			$this->load->view('tmpl/header', $data);
			$this->load->view('tmpl/navbar', $data);
			$this->load->view('home/status-pesanan', $data);
			$this->load->view('tmpl/footer');
			}else{
			$this->load->view('tmpl/header', $data);
			$this->load->view('tmpl/navbar', $data);
			$this->load->view('tmpl/sidebar', $data);
			$this->load->view('home/welcome', $data);
			$this->load->view('home/menu-admin', $data);
			$this->load->view('home/daftar-masakan', $data);
			$this->load->view('tmpl/footer');
			}
		}
		elseif($this->session->userdata('level') == 3 ){
			$this->load->view('tmpl/header');
			$this->load->view('tmpl/navbar', $data);
			$this->load->view('home/welcome');
			$this->load->view('home/menu-admin', $data);
			$this->load->view('tmpl/footer');
		}
		elseif($this->session->userdata('level') == 2 ){
			$this->load->view('tmpl/header', $data);
			$this->load->view('tmpl/navbar', $data);
			$this->load->view('home/welcome', $data);
			$this->load->view('home/menu-admin', $data);
			$this->load->view('tmpl/footer', $data);
		}
		elseif($this->session->userdata('level') == 1 ){
			$this->load->view('tmpl/header', $data);
			$this->load->view('tmpl/navbar', $data);
			$this->load->view('tmpl/sidebar', $data);
			$this->load->view('home/welcome', $data);
			$this->load->view('home/daftar-masakan', $data);
			$this->load->view('tmpl/footer', $data);
		}
	}


	public function about(){
		$data['status_order'] = $this->Order_Model->setIdOrder();		
		$this->load->view('tmpl/header', $data);
		$this->load->view('tmpl/navbar', $data);
		$this->load->view('home/about', $data);
		$this->load->view('tmpl/footer', $data);
	}

}
