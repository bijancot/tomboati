<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MJamaah extends CI_Model
{

    public function getJamaah()
    {
        $query = $this->db->get('PENDAFTARAN');
     
        return $query->result();
    }

    public function udpateJamaah()
    {
        $this->db->set('ISSEEN', 1);
        $this->db->where('ISSEEN', 0);
        $this->db->update('PENDAFTARAN');
    }

    public function verifPendaftaranJamaah($kodePendaftaran)
    {
        $this->db->set('STATUSPENDAFTARAN', 1);
        $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        return $this->db->update('PENDAFTARAN');
    }

    public function cabutPendaftaranJamaah($kodePendaftaran)
    {
        $this->db->set('STATUSPENDAFTARAN', 0);
        $this->db->where('KODEPENDAFTARAN', $kodePendaftaran);
        return $this->db->update('PENDAFTARAN');
    }
}
