<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MMaskapai extends CI_Model
{

    public function getMaskapai()
    {
        $query = $this->db->get('MASKAPAI');

        return $query->result();
    }

    public function saveMaskapai($data){
        return $this->db->insert('MASKAPAI', $data);
    }

    public function getSelectMaskapai($idMaskapai){
        $this->db->select('*');
        $this->db->from('MASKAPAI');
        $this->db->where('MASKAPAI.IDMASKAPAI', $idMaskapai);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateMaskapai($data){
        $this->db->where('IDMASKAPAI', $data['IDMASKAPAI']);
        return $this->db->update('MASKAPAI', $data);
    }

    public function deleteMaskapai($idMaskapai){
        $this->db->where('IDMASKAPAI', $idMaskapai);
        return $this->db->delete('MASKAPAI');
    }
}
