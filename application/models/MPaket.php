<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MPaket extends CI_Model
{

    public function getPaket($idMasterPaket)
    {
        $this->db->select('PAKET.*, MASTER_PAKET.*, MASKAPAI.NAMAMASKAPAI, MASKAPAI.IMAGEMASKAPAI');
        $this->db->from('PAKET');
        $this->db->join('MASTER_PAKET', 'MASTER_PAKET.IDMASTERPAKET = PAKET.IDMASTERPAKET');
        $this->db->join('MASKAPAI', 'MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI');
        $this->db->where('MASTER_PAKET.IDMASTERPAKET', $idMasterPaket);
        $this->db->order_by('PAKET.CREATED_AT', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    public function getMaskapai()
    {
        $this->db->select('*');
        $this->db->from('MASKAPAI');
        $query = $this->db->get();

        return $query->result();
    }

    public function savePaket($data)
    {
        $this->db->insert('PAKET', $data);
        return $this->db->insert_id();
    }
    
    public function getSelectPaket($idPaket)
    {
        $this->db->select('PAKET.*, MASTER_PAKET.*, MASKAPAI.NAMAMASKAPAI, MASKAPAI.IMAGEMASKAPAI');
        $this->db->from('PAKET');
        $this->db->join('MASTER_PAKET', 'MASTER_PAKET.IDMASTERPAKET = PAKET.IDMASTERPAKET');
        $this->db->join('MASKAPAI', 'MASKAPAI.IDMASKAPAI = PAKET.IDMASKAPAI','left');
        $this->db->where('PAKET.IDPAKET', $idPaket);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSelectItinerary($idPaket)
    {
        $this->db->from('DETAIL_ITINERARY');
        $this->db->join('PAKET', 'PAKET.IDPAKET = DETAIL_ITINERARY.IDPAKET');
        $this->db->where('DETAIL_ITINERARY.IDPAKET', $idPaket);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function updatePaket($data)
    {
        $this->db->where('IDPAKET', $data['IDPAKET']);
        return $this->db->update('PAKET', $data);
    }

    public function deletePaket($idPaket)
    {
        $this->db->where('IDPAKET', $idPaket);
        return $this->db->delete('PAKET');
    }

    public function deleteIntenary($idPaket)
    {
        $this->db->where('IDPAKET', $idPaket);
        return $this->db->delete('DETAIL_ITINERARY');
    }

    public function aktifPaket($idPaket)
    {
        $this->db->set('ISSHOW', 1);
        $this->db->where('IDPAKET', $idPaket);
        return $this->db->update('PAKET');
    }

    public function nonAktifPaket($idPaket)
    {
        $this->db->set('ISSHOW', 0);
        $this->db->where('IDPAKET', $idPaket);
        return $this->db->update('PAKET');
    }

    public function saveItinerary($data)
    {
        return $this->db->insert('DETAIL_ITINERARY', $data);
    }

    // Untuk Haji yang khusus
        public function getKhususPaket($idMasterPaket)
    {
        $this->db->select('*');
        $this->db->from('PAKET');
        $this->db->join('MASTER_PAKET', 'MASTER_PAKET.IDMASTERPAKET = PAKET.IDMASTERPAKET');
        $this->db->where('MASTER_PAKET.IDMASTERPAKET', $idMasterPaket);
        $this->db->order_by('PAKET.CREATED_AT', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    // Untuk Haji yang khusus
    public function getKhususSelectPaket($idPaket){
        $this->db->select('*');
        $this->db->from('PAKET');
        $this->db->join('MASTER_PAKET', 'MASTER_PAKET.IDMASTERPAKET = PAKET.IDMASTERPAKET');
        $this->db->where('PAKET.IDPAKET', $idPaket);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function totalPaketAktif()
    {
        $this->db->from('PAKET');
        $this->db->select('ISSHOW');
        $this->db->where('ISSHOW', 1);
        
        $query = $this->db->get('');

        return $query->num_rows();
    }

    public function totalPaketNonaktif()
    {
        $this->db->from('PAKET');
        $this->db->select('ISSHOW');
        $this->db->where('ISSHOW', 0);
        $query = $this->db->get('');

        return $query->num_rows();
    }
}
