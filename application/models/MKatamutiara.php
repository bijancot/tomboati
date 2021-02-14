<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKatamutiara extends CI_Model
{

    public function getKatamutiara()
    {
        $query = $this->db->get('KATA_MUTIARA');

        return $query->result();
    }

    public function saveKatamutiara($data)
    {
        $this->db->set('WAKTU', 'NOW()', FALSE);
        $this->db->insert('KATA_MUTIARA', $data);
    }

    public function getSelectKatamutiara($idKatamutiara)
    {
        $this->db->select('*');
        $this->db->from('KATA_MUTIARA');
        $this->db->where('KATA_MUTIARA.IDKATAMUTIARA', $idKatamutiara);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateKatamutiara($data)
    {
        $this->db->where('IDKATAMUTIARA', $data['IDKATAMUTIARA']);
        $this->db->update('KATA_MUTIARA', $data);
        //return $this->db->update('KATA_MUTIARA', $data, ['IDKATAMUTIARA' => $data['IDKATAMUTIARA']]);
    }

    public function deleteKatamutiara($idKatamutiara)
    {
        $this->db->where('IDKATAMUTIARA', $idKatamutiara);
        return $this->db->delete('KATA_MUTIARA');
    }
}
