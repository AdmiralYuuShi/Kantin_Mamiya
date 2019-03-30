<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("Login_Model");
        $this->load->model("Order_Model");
    }

    public function index(){
        $this->load->view("tmpl/header");
        $this->load->view("home/login-form");
        $this->load->view("tmpl/footer");
    }

    public function setLogin(){
        $cek = $this->Login_Model->getUserById();
        
        foreach($cek->result() as $dataUser){
            $level = $dataUser->id_level;
            $id = $dataUser->id_user;
            $nama = $dataUser->nama_user;
        }

        if($cek->num_rows() > 0 ){
            $data = array(
                'status' => "login",
                'level' => $level,
                'id_user' => $id,
                'nama' => $nama,
                'no_meja' => $this->input->post('no_meja')
            );
            if($level == 4){
                $this->session->set_userdata($data);
                $this->Order_Model->createOrder();
                $query2 = $this->Order_Model->getIdOrder();
                foreach($query2 as $data){
                    $id_order = $data->id_order;
                }        
                $data = array (
                    'id_order' => $id_order
                );
                $this->session->set_userdata($data);
                redirect(base_url());
            }else{
                $this->session->set_userdata($data);
                redirect(base_url());
            }
        }else{
            $this->session->set_flashdata('info','Username atau Password Salah!');
            redirect(base_url('Login'));
        }
    }

    public function setLogout(){
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }

}