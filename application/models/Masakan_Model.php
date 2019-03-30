<?php 

class Masakan_Model extends CI_Model{

    public function getAllMasakan(){
        $this->db->order_by('type', 'DESC');
        return $this->db->get('masakan')->result();
    }

    public function getMasakanById(){
        $where = array(
            'id_masakan' => $this->input->post('id_masakan')
        );
        return $this->db->get_where('masakan', $where)->result();   
    }


    public function createMasakan(){
        $data = $this->input->post();
        return $this->db->insert('masakan', $data);
    }

    public function updateMasakan(){
        $where = [
            'id_masakan' => $this->input->post('id_masakan')
        ];
        $this->db->where($where);
        return $this->db->update('masakan', $this->input->post());
    }

    public function deleteMasakan(){
        $where = [
            'id_masakan' => $this->uri->segment(3)
        ];
        $this->db->where($where);
        return $this->db->delete('masakan');
    }

}