<?php 

class Order_Model extends CI_Model{

    public function createOrder(){

        $data = array(
            'id_order' => '',
            'no_meja' => $this->session->userdata('no_meja'),
            'tanggal' => date('Y-m-d'),
            'id_user' => $this->session->userdata('id_user'),
            'keterangan' => '',
            'status_order' => 'Belum Memesan'
        );

        return $this->db->insert('order_masakan', $data);
    }

    public function getIdOrder(){
        return $this->db->get('order_masakan')->result();
    }

    public function setIdOrder(){
        $where = array(
            'id_order' => $this->session->userdata('id_order')
        );
        $this->db->where($where);
        return $this->db->get('order_masakan')->result();
    }

    public function createDetailOrder(){
        $data = array(
            'id_detail_order' => '',
            'id_order' => $this->session->userdata('id_order'),
            'id_masakan' => $this->input->post('id_masakan'),
            'jumlah' => $this->input->post('jumlah'),
            'harga_jumlah' => $this->input->post('jumlah') * $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
            'status_detail_order' => 'Memesan'
        );
        return $this->db->insert('detail_order', $data);
    }

    public function getDataOrder(){
        $this->db->select('*')->from('detail_order')->join('masakan', 'masakan.id_masakan = detail_order.id_masakan');
        $where = array(
            'id_order' => $this->session->userdata('id_order')
        );
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function totalHarga(){
        return $this->db->query('SELECT SUM(harga_jumlah) AS total_harga FROM detail_order WHERE id_order= '.$this->session->userdata('id_order'));
    }

    public function deleteDetailOrder(){
        $where = array(
            'id_detail_order' => $this->uri->segment(3)
        );
        $this->db->where($where);
        return $this->db->delete('detail_order');
    }

    public function updateOrder(){
        $data = array(
            'status_order' => 'Pesanan Diproses',
            'total_harga' => $this->input->post('total_harga')
        );
        $where = array(
            'id_order' => $this->session->userdata('id_order')
        );
        $this->db->where($where);
        return $this->db->update('order_masakan', $data);
    }

    public function pesananDiterima(){
        $data = array(
            'status_order' => 'Pesanan Diterima'
        );
        $where = array(
            'id_order' => $this->session->userdata('id_order')
        );
        $this->db->where($where);
        return $this->db->update('order_masakan', $data);
    }

    public function pesananSelesai(){
        $data = array(
            'status_order' => 'Pesanan Selesai'
        );
        $where = array(
            'id_order' => $this->session->userdata('id_order')
        );
        $this->db->where($where);
        return $this->db->update('order_masakan', $data);
    }

    public function getOrderById(){
        $where = [
            'id_order'=> $this->input->post('id_order')
        ];
        return $this->db->get_where('order_masakan', $where);
    }
}