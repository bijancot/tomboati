<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKomunitas extends CI_Model
{

    public function getKomunitas()
    {
        $query = $this->db->get('KOMUNITAS_INFO');

        return $query->result();
    }

    public function saveKomunitas($data)
    {
        $this->db->set('TANGGALNEWS', 'NOW()', FALSE);
        $this->db->insert('KOMUNITAS_INFO', $data);
    }

    public function getSelectKomunitas($idKomunitas)
    {
        $this->db->select('*');
        $this->db->from('KOMUNITAS_INFO');
        $this->db->where('KOMUNITAS_INFO.IDKOMUNITASINFO', $idKomunitas);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updateKomunitas($data)
    {
        //$this->db->where('IDKOMUNITASINFO', $data['IDKOMUNITASINFO']);
        //$this->db->update('Komunitas_INFO', $data);
        return $this->db->update('KOMUNITAS_INFO', $data, ['IDKOMUNITASINFO' => $data['IDKOMUNITASINFO']]);
    }

    public function deleteKomunitas($idKomunitas)
    {
        $this->db->where('IDKOMUNITASINFO', $idKomunitas);
        return $this->db->delete('KOMUNITAS_INFO');
    }
}
