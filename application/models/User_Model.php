<?php

class User_Model extends CI_Model{

    public function getUser(){
        return $this->db->get('user')->result();
    }

    public function createUser(){
        $data = array(
            'id_user' => '',
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('level')
        );
        return $this->db->insert('user', $data);
    }

    public function deleteUser(){
        $where = array(
            'id_user' => $this->uri->segment(3)
        );
        $this->db->where($where);
        return $this->db->delete('user');
    }

    public function updateUser(){
        $where = array(
            'id_user' => $this->input->post('id_user')
        );
        $this->db->where($where);
        return $this->db->update('user', $this->input->post());
    }
}