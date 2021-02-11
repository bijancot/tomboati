<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUmroh extends CI_Model
{

    public function getPaket($idMasterPaket)
    {
        $this->db->select('*');
        $this->db->from('PAKET');
        $this->db->join('MASTER_PAKET', 'MASTER_PAKET.IDMASTERPAKET = PAKET.IDMASTERPAKET');
        $this->db->join('MASKAPAI', 'MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI');
        $this->db->where('MASTER_PAKET.IDMASTERPAKET', $idMasterPaket);
        $query = $this->db->get();

        return $query->result();
    }

    public function getMaskapai(){
        $this->db->select('*');
        $this->db->from('MASKAPAI');
        $query = $this->db->get();

        return $query->result();  
    }

    public function savePaket($data){
        return $this->db->insert('PAKET', $data);
    }

    public function getSelectPaket($idPaket){
        $this->db->select('*');
        $this->db->from('PAKET');
        $this->db->join('MASTER_PAKET', 'MASTER_PAKET.IDMASTERPAKET = PAKET.IDMASTERPAKET');
        $this->db->join('MASKAPAI', 'MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI');
        $this->db->where('PAKET.IDPAKET', $idPaket);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updatePaket($data){
        $this->db->where('IDPAKET', $data['IDPAKET']);
        return $this->db->update('PAKET', $data);
    }

    public function deletePaket($idPaket){
        $this->db->where('IDPAKET', $idPaket);
        return $this->db->delete('PAKET');
    }

    public function aktifPaket($idPaket){
        $this->db->set('ISSHOW', 1);
        $this->db->where('IDPAKET', $idPaket);
        return $this->db->update('PAKET');
    }

    public function nonAktifPaket($idPaket){
        $this->db->set('ISSHOW', 0);
        $this->db->where('IDPAKET', $idPaket);
        return $this->db->update('PAKET');
    }
}
