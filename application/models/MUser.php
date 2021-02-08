<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUser extends CI_Model
{

    public function getUser()
    {
        $query = $this->db->get('USER_REGISTER');

        return $query->result();
    }

    public function saveUser($data){
        return $this->db->insert('USER_REGISTER', $data);
    }

    public function getSelectUser($idUser){
        $this->db->select('*');
        $this->db->from('USER_REGISTER');
        $this->db->where('USER_REGISTER.NOMORKTP', $idUser);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateUser($data){
        $this->db->where('NOMORKTP', $data['NOMORKTP']);
        return $this->db->update('USER_REGISTER', $data);
    }

    public function deleteUser($idUser){
        $this->db->where('NOMORKTP', $idUser);
        return $this->db->delete('USER_REGISTER');
    }

    public function verifUser($idUser){
        $this->db->set('STATUS', 1);
        $this->db->where('NOMORKTP', $idUser);
        return $this->db->update('USER_REGISTER');
    }

    public function cabutUser($idUser){
        $this->db->set('STATUS', 0);
        $this->db->where('NOMORKTP', $idUser);
        return $this->db->update('USER_REGISTER');
    }
}
