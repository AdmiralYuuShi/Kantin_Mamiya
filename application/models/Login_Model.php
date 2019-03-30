<?php 

class Login_Model extends CI_Model{

    public function getUserById(){
        
        $un = $this->input->post('username');
        $pw = $this->input->post('password');
        $where = array(
            'username' => $un,
            'password' => $pw
        );
        return $this->db->get_where('user', $where);
    }

}