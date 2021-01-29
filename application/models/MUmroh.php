<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUmroh extends CI_Model
{

    public function getPaket($idPaket)
    {
        $this->db->select('*');
        $this->db->from('PAKET');
        $this->db->join('MASTER_PAKET', 'MASTER_PAKET.IDMASTERPAKET = PAKET.IDMASTERPAKET');
        $this->db->join('MASKAPAI', 'MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI');
        $this->db->where('MASTER_PAKET.IDMASTERPAKET', $idPaket);
        $query = $this->db->get();

        return $query->result();
    }
}
