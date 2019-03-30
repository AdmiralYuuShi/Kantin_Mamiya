<?php 

class Transaksi_Model extends CI_Model{

    public function insertTransaksi(){
        $data = [
            'id_transaksi' => '',
            'id_user' => $this->input->post('id_user'),
            'id_order' => $this->input->post('id_order'),
            'tanggal' => date('Y-m-d'),
            'total_bayar' => $this->input->post('total_bayar'),
            'uang_masuk' => $this->input->post('uang_masuk'),
            'uang_kembali' => $this->input->post('uang_masuk') - $this->input->post('total_bayar')
        ];
        return $this->db->insert('transaksi', $data);
    }

    public function getTransaksi(){
        $where = [
            'id_order' => $this->session->userdata('id_order')
        ];
        return $this->db->get_where('transaksi', $where);
    }

    public function getTransaksiById(){
        $where = [
            'id_transaksi' => $this->uri->segment(3)
        ];
        return $this->db->get_where('transaksi', $where)->result();
    }
}